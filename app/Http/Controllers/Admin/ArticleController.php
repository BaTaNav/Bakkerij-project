<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{

    public function index(): View
    {

        $articles = Article::latest()->get();
        

        return view('admin.articles.index', compact('articles'));
    }


    public function create(): View
    {
        return view('admin.articles.create');
    }


    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // max 2MB
            'published_at' => 'nullable|date',
        ]);

     
        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('article-images', 'public');
            $validated['image'] = $path;
        }

        $validated['published_at'] = $validated['published_at'] ?? now();

  
        Article::create($validated);

    
        return redirect()->route('admin.articles.index')->with('success', 'Nieuwsartikel succesvol aangemaakt.');
    }

    public function show(Article $article)
    {

        return redirect()->route('admin.articles.edit', $article);
    }


    public function edit(Article $article): View
    {

        return view('admin.articles.edit', compact('article'));
    }


    public function update(Request $request, Article $article)
    {
      
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', 
            'published_at' => 'nullable|date',
        ]);

       
        if ($request->hasFile('image')) {
          
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            
           
            $path = $request->file('image')->store('article-images', 'public');
            $validated['image'] = $path;
        }

     
        $article->update($validated);

       
        return redirect()->route('admin.articles.index')->with('success', 'Nieuwsartikel succesvol bijgewerkt.');
    }


    public function destroy(Article $article)
    {
        
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

       
        $article->delete();

       
        return redirect()->route('admin.articles.index')->with('success', 'Nieuwsartikel succesvol verwijderd.');
    }
}