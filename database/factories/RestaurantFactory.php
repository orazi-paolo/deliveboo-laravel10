<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::inRandomOrder()->first(),
            "name" => fake()->name(),
            "description" => fake()->realText(),
            "address" => fake()->address(),
            "city" => fake()->city(),
            "VAT" => fake()->unique()->bothify("??##?#?##??"),
            "image" => "https://placehold.co/600x400?text=Placeholder"
        ];
    }
}
