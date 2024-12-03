<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index()
    {
        $plates = Plate::with("restaurant")->get();
        return response()->json([
            "success" => true,
            "results" => $plates
        ]);
    }

    public function show(Plate $plate)
    {
        $plate = Plate::with("restaurant")->findOrFail($plate->id);
        return response()->json([
            "success" => true,
            "results" => $plate
        ]);
    }
}