<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderTypes = [
            ['name' => 'Магазин витрина'],
            ['name' => 'Предварительный заказ'],
            ['name' => 'Срочный заказ'],
        ];

        foreach ($orderTypes as $orderType) {
            OrderType::create($orderType);
        }
    }
}
