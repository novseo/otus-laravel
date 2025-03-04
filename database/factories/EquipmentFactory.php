<?php

namespace Database\Factories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Equipment::class;

    public function definition(): array
    {
        return [
            'name'    => $this->faker->word(),
            'levels'  => $this->faker->numberBetween(1,4),
            'width'   => $this->faker->randomElement([10, 20, 40]),
            'length'  => $this->faker->randomElement([10, 20, 40]),
            'enabled' => $this->faker->boolean(),
        ];
    }
}
