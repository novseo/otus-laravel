<?php

namespace Database\Seeders;

use App\Models\Cycle;
use App\Models\Equipment;
use App\Models\EquipmentSlot;
use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderType;
use App\Models\Product;
use App\Models\ReservationSlot;
use App\Models\Slot;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EquipmentSeeder::class,
            CycleSeeder::class,
            SlotSeeder::class,
            OrderTypeSeeder::class,
            IngredientSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            EquipmentSlotSeeder::class,
            OrderProductSeeder::class,
            IngredientProductSeeder::class,
            ReservationSlotSeeder::class,
        ]);
    }
}
