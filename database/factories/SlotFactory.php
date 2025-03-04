<?php

namespace Database\Factories;

use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Slot::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'width' => $this->faker->randomElement([10, 20, 30]),
            'length' => $this->faker->randomElement([20, 30, 40]),
        ];
    }
}
