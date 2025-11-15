<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Importeer HasMany

class FaqCategory extends Model
{
    use HasFactory;

    /**
     * De attributen die massaal toewijsbaar zijn.
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Definieert de "one-to-many" relatie:
     * Een categorie heeft meerdere FAQ-items.
     */
    public function items(): HasMany
    {
        return $this->hasMany(FaqItem::class);
    }
}