<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrderProduct::class;

    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 4),
            'product_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
