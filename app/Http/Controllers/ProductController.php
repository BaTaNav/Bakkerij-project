<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\View\View; 

class ProductController extends Controller
{
    /**
     * Toont de publieke overzichtspagina van alle producten (de "winkel").
     */
    public function index(): View
    {
        $products = Product::latest()->get();

 
        return view('products.index', compact('products'));
    }

    /**
     * Toont de detailpagina van één specifiek product.
     */
    public function show(Product $product): View
    {
       
        return view('products.show', compact('product'));
    }
}