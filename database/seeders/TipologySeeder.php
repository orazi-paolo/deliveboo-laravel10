<?php

namespace Database\Seeders;

use App\Models\Tipology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipologies = [
            "Pizza",
            "Hamburger",
            "Sushi",
            "Cucina Italiana",
            "Cucina Cinese",
            "Cucina Indiana",
            "Cucina Giapponese",
            "Cucina Messicana",
            "Cucina Mediterranea",
            "Cucina Vegetariana",
            "Cucina Vegana",
            "Healthy",
            "Fast Food",
            "Pasticceria",
            "Gelato",
        ];

        foreach ($tipologies as $tipology) {
            Tipology::create([
                'name' => $tipology,
                "image" => null,
                "image_placeholder" => "https://placehold.co/600x400?text=Tipology"
            ]);
        }
    }
}