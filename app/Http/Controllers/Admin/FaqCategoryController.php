<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqCategoryController extends Controller
{

    public function index(): View
    {
        $categories = FaqCategory::all();
        return view('admin.faq-categories.index', compact('categories'));
    }


    public function create(): View
    {
        return view('admin.faq-categories.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq-categories.index')->with('success', 'Categorie succesvol aangemaakt.');
    }


    public function edit(FaqCategory $faqCategory): View
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }


    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name,' . $faqCategory->id,
        ]);

        $faqCategory->update($validated);

        return redirect()->route('admin.faq-categories.index')->with('success', 'Categorie succesvol bijgewerkt.');
    }


    public function destroy(FaqCategory $faqCategory)
    {
      
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')->with('success', 'Categorie succesvol verwijderd.');
    }
}