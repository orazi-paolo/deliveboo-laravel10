<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "restaurant_id" => Restaurant::all()->random()->id,
            "name" => fake()->name(),
            "email" => fake()->email(),
            "phone_number" => fake()->phoneNumber(),
            "address" => fake()->streetAddress(),
            "city" => fake()->city(),
            "date" => fake()->dateTimeBetween("-1 month", "now"),
            "total" => fake()->randomFloat(2, 10, 100),
        ];
    }
}
