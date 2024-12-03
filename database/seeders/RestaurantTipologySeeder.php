<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Tipology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTipologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all();
        $tipologyIds = Tipology::all()->pluck("id");

        foreach ($restaurants as $restaurant) {
            $restaurant->tipologies()->sync($this->getRandomTipologies($tipologyIds));
        }
    }

    private function getRandomTipologies($tipologyIds): array
    {
        return fake()->randomElements($tipologyIds, rand(1, 3));
    }
}
