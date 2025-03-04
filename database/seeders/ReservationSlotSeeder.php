<?php

namespace Database\Seeders;

use App\Models\ReservationSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationSlot::factory()->count(4)->create();
    }
}
