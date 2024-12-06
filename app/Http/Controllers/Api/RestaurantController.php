<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with("plates", "tipologies")->get();
        return response()->json([
            "success" => true,
            "results" => $restaurants
        ]);
    }

    public function show(Restaurant $restaurant)
    {
        $restaurant = Restaurant::with("plates", "tipologies")->findOrFail($restaurant->id);
        return response()->json([
            "success" => true,
            "results" => $restaurant
        ]);
    }

    public function filterByTipologies(Request $request)
    {
        // Prendiamo i parametri delle tipologie dalla query string
        $tipologyIds = $request->input('tipologies');

        // Verifichiamo se sono stati forniti ID delle tipologie
        if ($tipologyIds) {
            // Convertiamo la stringa degli IDs in un array se risulta essere una stringa
            $tipologyIdsArray = is_string($tipologyIds) ? explode(',', $tipologyIds) : $tipologyIds;

            // Filtriamo i ristoranti in base agli IDs delle tipologie
            $restaurants = Restaurant::whereHas('tipologies', function ($query) use ($tipologyIdsArray) {
                $query->whereIn('id', $tipologyIdsArray); // Utilizziamo whereIn() per filtrare ristoranti con ALMENO UNA delle tipologie specificate
            })->with('plates', 'tipologies')->get();
        } else {
            // Se non è fornito alcun filtro, restituiamo tutti i ristoranti
            $restaurants = Restaurant::with('plates', 'tipologies')->get();
        }

        return response()->json([
            "success" => true,
            "results" => $restaurants
        ]);
    }
}