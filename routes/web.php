<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::get('/cars/offers', [CarsController::class, 'index'])->name('cars.offers');
Route::get('/cars/ownoffers', [CarsController::class, 'ownOffers'])->name('cars.ownoffers');
Route::get('/offers', [CarsController::class, 'create'])->name('offers.index');

Route::middleware('auth')->group(function () {
    //
});

/* crud voor het aanbieden van auto's */
Route::get('/offers/create', [CarsController::class, 'create'])->name('offers.create');
Route::post('/offers/create', [CarsController::class, 'store'])->name('offers.store');
Route::get('/offers/edit/{car}',[CarsController::class, 'edit'])->name('offers.edit');
Route::post('/offers/edit/{car}', [CarsController::class, 'update'])->name('offers.update');
Route::delete('/offers/delete/{car}', [CarsController::class, 'destroy'])->name('offers.destroy');

require __DIR__.'/auth.php';
