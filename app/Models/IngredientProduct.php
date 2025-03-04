<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientProduct extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientProductFactory> */
    use HasFactory;

    protected $table = 'ingredient_products';
    protected $fillable = [
        'ingredient_id',
        'product_id',
        'quantity',
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

};
