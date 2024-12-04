<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlateController;
use App\Http\Controllers\Api\RestaurantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Plate resources
Route::prefix("plates")->name("api.plates.")->group(function () {
    Route::get("/", [PlateController::class, "index"])->name("index");
    Route::get("/{plate}", [PlateController::class, "show"])->name("show");
});

Route::get('/restaurant', [RestaurantController::class, 'index'])->name('api.restaurants.index');
Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'show'])->name('api.restaurants.show');
