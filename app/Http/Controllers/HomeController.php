<?php

namespace App\Http\Controllers;

use App\Models\Article; 
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Toon de publieke homepage.
     */
    public function index(): View
    {
        
        $latestArticles = Article::where('published_at', '<=', now())
                                ->latest('published_at')
                                ->take(3)
                                ->get();

       
        return view('home', [
            'latestArticles' => $latestArticles,
        ]);
    }
}