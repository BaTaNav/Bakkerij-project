<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // Categorie: Bestellen
        $bestellenCat = FaqCategory::create([
            'name' => 'Bestellen',
        ]);

        FaqItem::create([
            'faq_category_id' => $bestellenCat->id,
            'question' => 'Hoe kan ik een bestelling plaatsen?',
            'answer' => 'U kunt online bestellen via onze webshop. Voeg producten toe aan uw winkelwagen en ga naar de kassa om af te rekenen.',
        ]);

        FaqItem::create([
            'faq_category_id' => $bestellenCat->id,
            'question' => 'Kan ik mijn bestelling annuleren?',
            'answer' => 'Ja, u kunt uw bestelling annuleren tot 24 uur voor de geplande afhaalmoment. Neem contact met ons op via telefoon of email.',
        ]);

        // Categorie: Levering
        $leveringCat = FaqCategory::create([
            'name' => 'Levering & Afhalen',
        ]);

        FaqItem::create([
            'faq_category_id' => $leveringCat->id,
            'question' => 'Leveren jullie aan huis?',
            'answer' => 'Momenteel bieden we alleen afhalen in de winkel aan. Thuisbezorging is in ontwikkeling.',
        ]);

        FaqItem::create([
            'faq_category_id' => $leveringCat->id,
            'question' => 'Wanneer kan ik mijn bestelling ophalen?',
            'answer' => 'U kunt uw bestelling ophalen tijdens onze openingstijden: ma-vr 7:00-18:00, za 8:00-17:00, zo 9:00-13:00.',
        ]);

        // Categorie: Producten
        $productenCat = FaqCategory::create([
            'name' => 'Producten',
        ]);

        FaqItem::create([
            'faq_category_id' => $productenCat->id,
            'question' => 'Zijn jullie producten vers?',
            'answer' => 'Ja! Alle producten worden dagelijks vers gebakken in onze eigen bakkerij met de beste ingrediënten.',
        ]);

        FaqItem::create([
            'faq_category_id' => $productenCat->id,
            'question' => 'Hebben jullie glutenvrije opties?',
            'answer' => 'Ja, we hebben verschillende glutenvrije broden en gebakjes. Deze zijn duidelijk gemarkeerd in onze webshop.',
        ]);
    }
}
