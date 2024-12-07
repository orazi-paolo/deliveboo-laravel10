<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plate>
 */
class PlateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            "https://images.pexels.com/photos/29654027/pexels-photo-29654027.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29655572/pexels-photo-29655572/free-photo-of-deliziosi-spaghetti-al-sugo-di-pomodoro-e-prezzemolo.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29653207/pexels-photo-29653207/free-photo-of-delizioso-dessert-con-mirtilli-e-guarnizione-alla-menta.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29653202/pexels-photo-29653202.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29640883/pexels-photo-29640883.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29629192/pexels-photo-29629192/free-photo-of-cibo.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29617467/pexels-photo-29617467.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29616970/pexels-photo-29616970/free-photo-of-deliziose-uova-strapazzate-su-pane-fresco.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29614913/pexels-photo-29614913.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29609013/pexels-photo-29609013/free-photo-of-autentica-pizza-napoletana-con-basilico-fresco.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29578926/pexels-photo-29578926/free-photo-of-delizioso-fish-and-chips-con-insalata-fresca.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29654996/pexels-photo-29654996/free-photo-of-primo-piano-di-una-crostata-di-frutta-su-un-piatto-decorato.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29654997/pexels-photo-29654997/free-photo-of-panino-per-la-colazione-con-caffe-su-piatto-bianco.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29653154/pexels-photo-29653154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29653209/pexels-photo-29653209/free-photo-of-pollo-fritto-croccante-con-salsa-di-accompagnamento-vista-dall-alto.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            "https://images.pexels.com/photos/29653204/pexels-photo-29653204/free-photo-of-patatine-fritte-croccanti-con-salsa-cremosa.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
        ];

        $names = [
            "Spaghetti al Sugo di Pomodoro e Prezzemolo",
            "Spaghetti alla Carbonara",
            "Lasagne alla Bolognese",
            "Penne all'Arrabbiata",
            "Risotto ai Funghi",
            "Pasta alla Norma",
            "Ravioli di Ricotta",
            "Pizza Margherita",
            "Pizza Quattro Formaggi",
            "Pizza Capricciosa",
            "Pizza Diavola",
            "Pizza con Prosciutto e Funghi",
            "Tiramisù",
            "Panna Cotta",
            "Cannoli Siciliani",
            "Torta Mimosa",
            "Profiteroles",
            "Cheesecake",
            "Hamburger",
            "Cheeseburger",
            "Double Cheeseburger",
            "Chicken Nuggets",
            "Chicken Tenders",
            "Chicken Wings",
            "Chicken Fingers",
            "Coca Cola",
            "Pepsi",
            "Fanta",
            "Sprite",
        ];
        return [
            "restaurant_id" => Restaurant::inRandomOrder()->first(),
            "name" => fake()->randomElement($names),
            "description" => fake()->paragraph(),
            "ingredient_description" => implode(",", fake()->words()),
            "price" => fake()->randomFloat(2, 1, 30),
            "visible" => fake()->boolean(),
            "image" => null,
            "image_placeholder" => fake()->randomElement($images)
        ];
    }
}