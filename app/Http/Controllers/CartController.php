<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order; 
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 

class CartController extends Controller
{
    /**
     * Toont de winkelwagen pagina.
     */
    public function index(): View
    {
        $cartItems = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        
        $totalPriceInEuros = number_format($totalPrice / 100, 2, ',', '.');

        return view('cart.index', compact('cartItems', 'totalPriceInEuros'));
    }

    /**
     * Voegt een product toe aan de winkelwagen per sessie.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:20',
        ]);

        $cart = session()->get('cart', []);
        $productId = $product->id;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $request->quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => (int)$request->quantity,
                "price" => $product->price, // Prijs in centen
                "image" => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product toegevoegd aan winkelwagen!');
    }

    /**
     * Verwijdert een item uit de winkelwagen.
     */
    public function destroy($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product verwijderd uit winkelwagen.');
    }

    /**
     * Verwerkt de winkelwagen en maakt een order aan in de database.
     * 
     */
    public function checkout(Request $request)
    {
        $cartItems = session()->get('cart', []);
        $user = Auth::user();

       
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Je winkelwagen is leeg.');
        }

       
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        
        DB::beginTransaction();

        try {
            
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
                'status' => 'pending', 
            ]);

          
            $orderData = [];
            foreach ($cartItems as $productId => $item) {
                $orderData[$productId] = [
                    'quantity' => $item['quantity'],
                    'price_at_time_of_purchase' => $item['price'] 
                ];
            }

           
            $order->products()->attach($orderData);

            
            DB::commit();

            
            session()->forget('cart');

            
            return redirect()->route('dashboard')->with('success', 'Bestelling succesvol geplaatst! Bedankt.');

        } catch (\Exception $e) {
            
            DB::rollBack();
            
            
            return redirect()->route('cart.index')->with('error', 'Er is iets misgegaan bij het plaatsen van je bestelling. Probeer het opnieuw.');
        }
    }
}