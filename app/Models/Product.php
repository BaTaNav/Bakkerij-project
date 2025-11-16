<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price', // word opgeslagen in cent
        'image',
    ];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
                ? asset('storage/' . $value)
                : 'https://placehold.co/400x300/E2E8F0/94A3B8?text=Product', // Placeholder
        );
    }


    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity', 'price_at_time_of_purchase'); // Vraag ook de pivot-data op
    }


    protected function priceInEuros(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price / 100, 2, ',', '.')
        );
    }
}