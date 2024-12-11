<?php

namespace Database\Seeders;

use App\Models\Plate;
use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatePurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purchases = Purchase::all();
        $plates = Plate::all()->pluck("id");

        foreach ($purchases as $purchase) {
            $purchase->plates()->attach($this->getRandomPlates($plates), ['quantity' => rand(1, 5)]);
        }
    }

    private function getRandomPlates($plates): array
    {
        return fake()->randomElements($plates, rand(1, 10));
    }
}
