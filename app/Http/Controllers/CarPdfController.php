<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CarPdfController extends Controller
{
    public function generateCarPdf($carId)
    {
        // Haal de auto op uit de database
        $car = Car::findOrFail($carId);

        // Genereer de PDF
        $pdf = Pdf::loadView('cars.pdf', compact('car'));

        // Return de PDF als download
        return $pdf->download('auto_gegevens_' . $car->license_plate . '.pdf');
    }
}

