<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory; // Nodig voor de dropdown
use App\Models\FaqItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqItemController extends Controller
{
    /**
     * Toont een overzicht van alle vragen.
     */
    public function index(): View
    {

        $items = FaqItem::with('category')->latest()->get();
        return view('admin.faq-items.index', compact('items'));
    }

    /**
     * Toont het formulier om een nieuwe vraag aan te maken.
     */
    public function create(): View
    {
        
        $categories = FaqCategory::all();
        return view('admin.faq-items.create', compact('categories'));
    }

    /**
     * Slaat de nieuwe vraag op.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqItem::create($validated);

        return redirect()->route('admin.faq-items.index')->with('success', 'Vraag succesvol aangemaakt.');
    }

    /**
     * Toont het formulier om een bestaande vraag te bewerken.
     */
    public function edit(FaqItem $faqItem): View
    {
        
        $categories = FaqCategory::all();
        return view('admin.faq-items.edit', compact('faqItem', 'categories'));
    }

    /**
     * Slaat de wijzigingen van de vraag op.
     */
    public function update(Request $request, FaqItem $faqItem)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqItem->update($validated);

        return redirect()->route('admin.faq-items.index')->with('success', 'Vraag succesvol bijgewerkt.');
    }

    /**
     * Verwijdert de vraag.
     */
    public function destroy(FaqItem $faqItem)
    {
        $faqItem->delete();
        return redirect()->route('admin.faq-items.index')->with('success', 'Vraag succesvol verwijderd.');
    }
}