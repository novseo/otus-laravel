<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\EquipmentSlot;
use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipmentSlot>
 */
class EquipmentSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EquipmentSlot::class;

    public function definition(): array
    {
        return [
            'equipment_id' => $this->faker->numberBetween(1,4),
            'slot_id' => $this->faker->numberBetween(1,4),
        ];
    }
}
