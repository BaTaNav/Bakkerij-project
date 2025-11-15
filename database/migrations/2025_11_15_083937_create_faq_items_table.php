<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            
            // Dit is de one-to-many relatie:
            $table->foreignId('faq_category_id') // De 'many' kant
                  ->constrained('faq_categories') // Verwijst naar de 'id' op de 'faq_categories' tabel
                  ->onDelete('cascade'); // Als je een categorie verwijdert, worden de vragen ook verwijderd

            $table->text('question'); // De vraag
            $table->text('answer');   // Het antwoord
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_items');
    }
};
