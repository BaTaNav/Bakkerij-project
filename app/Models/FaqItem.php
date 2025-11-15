<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importeer BelongsTo

class FaqItem extends Model
{
    use HasFactory;

    /**
     * De attributen die massaal toewijsbaar zijn.
     */
    protected $fillable = [
        'faq_category_id',
        'question',
        'answer',
    ];

    /**
     * Definieert de "many-to-one" relatie:
     * Een FAQ-item hoort bij één categorie.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}