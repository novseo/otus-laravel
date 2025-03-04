<?php

namespace Database\Factories;

use App\Models\OrderType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderType>
 */
class OrderTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrderType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Магазин витрина',
                'Предварительный заказ',
                'Срочный заказ',
            ]),
        ];
    }
}
