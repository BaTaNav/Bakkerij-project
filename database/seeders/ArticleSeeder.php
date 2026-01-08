<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title' => 'Welkom bij onze bakkerij!',
            'image' => 'article-images/welkom.png',
            'content' => 'We zijn trots om onze deuren te openen voor u. Onze bakkerij biedt de beste broden, taarten en gebakjes in de regio. Al onze producten worden dagelijks vers gebakken met de beste ingrediënten.',
            'published_at' => now()->subDays(7),
        ]);

        Article::create([
            'title' => 'Nieuwe opening tijden tijdens de feestdagen',
            'image' => 'article-images/feestdagen.jpg',
            'content' => 'Tijdens de feestdagen zijn we geopend van 8:00 tot 14:00. Op 25 december en 1 januari zijn we gesloten. Bedankt voor uw begrip en fijne feestdagen!',
            'published_at' => now()->subDays(3),
        ]);

        Article::create([
            'title' => 'Nieuw product: Chocolade croissants',
            'image' => 'article-images/croissant.png',
            'content' => 'We hebben een nieuw product toegevoegd aan ons assortiment! Onze verse chocolade croissants zijn nu beschikbaar. Kom ze proeven!',
            'published_at' => now()->subDay(),
        ]);
    }
}
