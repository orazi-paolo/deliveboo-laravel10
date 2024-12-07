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
            ["name" => "Pizza", "image" => "https://images.pexels.com/photos/365459/pexels-photo-365459.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Hamburger", "image" => "https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Sushi", "image" => "https://images.unsplash.com/photo-1499125562588-29fb8a56b5d5?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"],
            ["name" => "Cucina Italiana", "image" => "https://images.pexels.com/photos/803963/pexels-photo-803963.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Cinese", "image" => "https://images.pexels.com/photos/955137/pexels-photo-955137.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Indiana", "image" => "https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Giapponese", "image" => "https://images.pexels.com/photos/1833349/pexels-photo-1833349.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Messicana", "image" => "https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Mediterranea", "image" => "https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Vegetariana", "image" => "https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Cucina Vegana", "image" => "https://images.pexels.com/photos/842571/pexels-photo-842571.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Pasticceria", "image" => "https://images.pexels.com/photos/291528/pexels-photo-291528.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
            ["name" => "Gelato", "image" => "https://images.pexels.com/photos/434295/pexels-photo-434295.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"],
        ];

        foreach ($tipologies as $tipology) {
            Tipology::create([
                'name' => $tipology['name'],
                "image" => $tipology['image'],
                "image_placeholder" => "https://placehold.co/600x400?text=" . $tipology['name']
            ]);
        }
    }
}
