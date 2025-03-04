<?php

namespace Database\Factories;

use App\Models\ReservationSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservationSlot>
 */
class ReservationSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ReservationSlot::class;

    public function definition(): array
    {
        return [
            'cycle_id' => $this->faker->numberBetween(1, 4),
            'product_id' => $this->faker->numberBetween(1, 10),
            'equipment_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
