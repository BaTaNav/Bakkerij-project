<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // Model importeren
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Voor afbeeldingen
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Toont het overzicht van alle producten.
     */
    public function index(): View
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Toont het formulier om een nieuw product aan te maken.
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Slaat een nieuw product op in de database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0', // Prijs in euro's (bv. 2.50)
            'image' => 'nullable|image|max:2048', // max 2MB
        ]);

        // Converteer prijs naar centen voor opslag
        $validated['price'] = (int)($validated['price'] * 100);

        // Verwerk de afbeelding
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product-images', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product succesvol aangemaakt.');
    }

    /**
     * Toont het formulier om een product te bewerken.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Slaat de wijzigingen van een product op.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0', // Prijs in euro's
            'image' => 'nullable|image|max:2048',
        ]);

        // Converteer prijs naar centen
        $validated['price'] = (int)($validated['price'] * 100);

        // Verwerk de afbeelding als er een nieuwe is
        if ($request->hasFile('image')) {
            // Verwijder de oude afbeelding
            if ($product->image && $product->image != 'https://placehold.co/400x300/E2E8F0/94A3B8?text=Product') {
                 Storage::disk('public')->delete($product->getRawOriginal('image'));
            }
            // Sla de nieuwe op
            $path = $request->file('image')->store('product-images', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product succesvol bijgewerkt.');
    }

    /**
     * Verwijdert een product.
     */
    public function destroy(Product $product)
    {
        // Verwijder de afbeelding van de server
        if ($product->image && $product->image != 'https://placehold.co/400x300/E2E8F0/94A3B8?text=Product') {
            Storage::disk('public')->delete($product->getRawOriginal('image'));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product succesvol verwijderd.');
    }
}