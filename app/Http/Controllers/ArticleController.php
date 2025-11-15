<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View; // Belangrijk om View te importeren

class ArticleController extends Controller
{
    /**
     * Toont de publieke lijst van alle nieuwsartikelen.
     */
    public function index(): View
    {
        // Haal alle artikelen op die nu of in het verleden gepubliceerd zijn
        // en zet de nieuwste bovenaan.
        $articles = Article::where('published_at', '<=', now())
                            ->latest('published_at')
                            ->get();

        // Stuur de data naar de view 'articles.index'
        // Dit bestand gaan we in de volgende stap aanmaken.
        return view('articles.index', compact('articles'));
    }

    /**
     * Toont één specifiek nieuwsartikel (detailpagina).
     * Deze vullen we later in.
     */
    public function show(Article $article): View
    {
        // Controleer of het artikel al gepubliceerd is
        if ($article->published_at > now() || !$article->published_at) {
            abort(404); // Toon een 404 als het nog niet gepubliceerd is
        }
        
        // Deze view ('articles.show') maken we hierna.
        return view('articles.show', compact('article'));
    }
}