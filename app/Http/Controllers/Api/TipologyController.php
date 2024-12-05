<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipology;
use Illuminate\Http\Request;

class TipologyController extends Controller
{
    public function index()
    {
        $tipologies = Tipology::with("restaurants")->get();
        return response()->json([
            "success" => true,
            "results" => $tipologies
        ]);
    }

    public function show(tipology $tipology)
    {
        $tipology = Tipology::with("restaurants")->findOrFail($tipology->id);
        return response()->json([
            "success" => true,
            "results" => $tipology
        ]);
    }
}
