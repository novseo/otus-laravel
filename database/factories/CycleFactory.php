<?php

namespace Database\Factories;

use App\Models\Cycle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cycle>
 */
class CycleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cycle::class;

    public function definition(): array
    {
        $timeStart = $this->faker->randomElement(['07:00:00', '10:00:00', '13:00:00', '16:00:00']);
        $timeEnd = (new \DateTime($timeStart))->modify('+3 hours')->format('H:i:s');
        $date = $this->faker->dateTimeBetween('now', '+1 day')->format('Y-m-d');

        return [
            'date' => $date,
            'time_start' => $timeStart,
            'time_end' => $timeEnd,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

