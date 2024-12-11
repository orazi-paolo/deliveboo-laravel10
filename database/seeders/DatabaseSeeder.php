<?php

namespace Database\Seeders;

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
            RestaurantSeeder::class,
            TipologySeeder::class,
            RestaurantTipologySeeder::class,
            PlateSeeder::class,
            PurchaseSeeder::class,
            PlatePurchaseSeeder::class,
        ]);
    }
}
