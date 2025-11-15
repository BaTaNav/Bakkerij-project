<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory; 
use Illuminate\Http\Request;
use Illuminate\View\View; 

class FaqController extends Controller
{
    /**
     * Toon de publieke FAQ-pagina, gegroepeerd per categorie.
     */
    public function index(): View
    {
        
        $categories = FaqCategory::with('items')->get();

       
        return view('faq.index', compact('categories'));
    }
}