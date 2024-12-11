<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterAdvanceController;
use App\Http\Controllers\Admin\PlateController as AdminPlateController;
use App\Http\Controllers\Admin\PurchaseController as AdminPurchaseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterAdvanceController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterAdvanceController::class, 'register'])->name('register.submit');

Route::prefix('/admin')->name('admin.')->group(function () {

    // Route::get('plates/trash/index', [AdminPlateController::class, 'deletedIndex'])->name('plates.deleted-index');
    // Route::patch("/plates/{plate}/restore", [AdminPlateController::class, "restore"])->name("plates.restore")->withTrashed();
    // Route::delete("/plates/{plate}/force-delete", [AdminPlateController::class, "forceDelete"])->name("plates.force-delete")->withTrashed();

    Route::resource('plates', AdminPlateController::class);
    Route::get('purchases', [AdminPurchaseController::class, 'index'])->name('purchases.index');
    Route::get('purchases/{purchase}', [AdminPurchaseController::class, 'show'])->name('purchases.show');
    Route::delete('purchases/{purchase}', [AdminPurchaseController::class, 'destroy'])->name('purchases.destroy');
});
