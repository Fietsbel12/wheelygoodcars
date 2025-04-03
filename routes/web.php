<?php

use App\Http\Controllers\CarPdfController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\TagController;
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

// API
Route::get('/car-info/{licensePlate}', function ($licensePlate) {
    // RDW API aanroepen
    $url = "https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken={$licensePlate}";
    $response = Http::get($url);
    $data = $response->json();

    // Controleren of er een voertuig is gevonden
    if (empty($data)) {
        return response()->json(['error' => 'Geen voertuig gevonden'], 404);
    }

    $car = $data[0]; // Eerste resultaat gebruiken
    return response()->json([
        'brand' => $car['merk'] ?? 'Onbekend',
        'model' => $car['handelsbenaming'] ?? 'Onbekend',
        'year' => isset($car['datum_eerste_toelating']) ? substr($car['datum_eerste_toelating'], 0, 4) : 'Onbekend'
    ]);
});

Route::get('/cars/offers', [CarsController::class, 'index'])->name('cars.offers');
Route::get('/cars/ownoffers', [CarsController::class, 'ownOffers'])->name('cars.ownoffers');
Route::get('/tags/index', [TagController::class, 'index'])->name('tags.index');


/* Maakt PDF */
Route::get('/car/{carId}/pdf', [CarPdfController::class, 'generateCarPdf'])->name('car.generatePdf');

/* crud voor het aanbieden van auto's */
Route::get('/offers/create', [CarsController::class, 'create'])->name('offers.create');
Route::post('/offers/create', [CarsController::class, 'store'])->name('offers.store');
Route::get('/offers/edit/{car}',[CarsController::class, 'edit'])->name('offers.edit');
Route::post('/offers/edit/{car}', [CarsController::class, 'update'])->name('offers.update');
Route::delete('/offers/delete/{car}', [CarsController::class, 'destroy'])->name('offers.destroy');

Route::middleware('auth')->group(function () {
    //
});

Route::get('/offers/{car}', [CarsController::class, 'show'])->name('offers.show');

require __DIR__.'/auth.php';
