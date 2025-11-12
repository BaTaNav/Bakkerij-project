<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; 

class Article extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'image',
        'content',
        'published_at',
    ];


    protected $casts = [
        'published_at' => 'datetime',
    ];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
                ? asset('storage/' . $value) 
                : 'https://placehold.co/600x400/E2E8F0/94A3B8?text=Geen+Afbeelding', // return placeholder if no image is set
        );
    }
}