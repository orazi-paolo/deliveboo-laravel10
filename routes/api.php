<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlateController;
use App\Http\Controllers\Api\RestaurantController;
use App\Models\Restaurant;

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

// Plate API resources
Route::prefix("plates")->name("api.plates.")->group(function () {
    Route::get("/", [PlateController::class, "index"])->name("index");
    Route::get("/{plate}", [PlateController::class, "show"])->name("show");
});
// Restaurant API resources
Route::prefix("restaurant")->name("api.restaurants.")->group(function () {
    Route::get('/', [RestaurantController::class, 'index'])->name('index');
    Route::get('/filter', [RestaurantController::class, 'filterByTipologies'])->name('filter');
    Route::get('/{restaurant}', [RestaurantController::class, 'show'])->name('show');
});
// Tipology API resources
Route::prefix("tipologies")->name("api.tipologies.")->group(function () {
    Route::get('/', [RestaurantController::class, 'index'])->name('index');
    Route::get('/{tipology}', [RestaurantController::class, 'show'])->name('show');
});