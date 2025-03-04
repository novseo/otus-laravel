<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $dates = [$today, $tomorrow];

        foreach ($dates as $date) {
            $startTime = strtotime('07:00:00');
            while (date('H:i:s', $startTime) <= '16:00:00') {
                $timeStart = date('H:i:s', $startTime);
                $timeEnd = date('H:i:s', strtotime('+3 hours', $startTime));
                Cycle::create([
                    'date' => $date,
                    'time_start' => $timeStart,
                    'time_end' => $timeEnd,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $startTime = strtotime('+3 hours', $startTime);
            }
        }
    }
}
