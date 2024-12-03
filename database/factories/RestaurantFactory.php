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
        $userIds = User::all()->pluck("id");
        return [
            "user_id" => fake()->unique()->randomElement($userIds),
            "name" => fake()->company(),
            "description" => fake()->realText(),
            "address" => fake()->streetAddress(),
            "city" => fake()->city(),
            "VAT" => fake()->unique()->bothify("??##?#?##??"),
            "image" => "https://placehold.co/600x400?text=Restaurant"
        ];
    }
}
