<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Broden
        Product::create([
            'name' => 'Wit brood',
            'description' => 'Klassiek wit brood, perfect voor tosti\'s en sandwiches',
            'price' => 250, // in centen
            'image' => null,
        ]);

        Product::create([
            'name' => 'Meergranenbrood',
            'description' => 'Gezond brood met verschillende granen en zaden',
            'price' => 350,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Desembrood',
            'description' => 'Traditioneel zuurdesembrood met een krokante korst',
            'price' => 400,
            'image' => null,
        ]);

        // Croissants & Gebak
        Product::create([
            'name' => 'Boter croissant',
            'description' => 'Verse, knapperige croissant met echte boter',
            'price' => 180,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Chocolade croissant',
            'description' => 'Croissant gevuld met pure chocolade',
            'price' => 220,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Appeltaart',
            'description' => 'Huisgemaakte appeltaart met kaneel',
            'price' => 350,
            'image' => null,
        ]);

        // Koekjes
        Product::create([
            'name' => 'Chocoladekoekjes (per 6)',
            'description' => 'Zachte koekjes met chocoladestukjes',
            'price' => 450,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Boterkoekjes (per 6)',
            'description' => 'Krokante boterkoekjes',
            'price' => 380,
            'image' => null,
        ]);

        // Taarten
        Product::create([
            'name' => 'Slagroomtaart (8 personen)',
            'description' => 'Heerlijke slagroomtaart met vers fruit',
            'price' => 1850,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Chocoladetaart (8 personen)',
            'description' => 'Rijke chocoladetaart voor echte chocoladeliefhebbers',
            'price' => 2000,
            'image' => null,
        ]);
    }
}
