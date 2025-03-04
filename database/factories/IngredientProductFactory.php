<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IngredientProduct>
 */
class IngredientProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = IngredientProduct::class;

    public function definition(): array
    {
        return [
            'ingredient_id' => Ingredient::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(10, 100),
        ];
    }
}
