<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View; 

class ArticleController extends Controller
{

    public function index(): View 
    {
        $articles = Article::where('published_at', '<=', now())
                            ->latest('published_at')
                            ->get();

       
        return view('articles.index', compact('articles'));
    }


    public function show(Article $article): View 
    {
        
        if ($article->published_at > now()) {
            abort(404);
        }

        
        return view('articles.show', compact('article'));
    }
}