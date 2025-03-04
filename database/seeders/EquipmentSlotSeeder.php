<?php

namespace Database\Seeders;

use App\Models\EquipmentSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EquipmentSlot::factory()->count(4)->create();
    }
}
