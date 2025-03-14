<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::whereNull('sold_at')->orderBy('created_at', 'desc')->get();
        return view('cars.offers')->with('cars', $cars);
    }

    public function ownOffers(){
        $cars = Car::where('user_id', auth()->id())->get();
        return view('cars.ownoffers', compact('cars'));
    }

    public function create(Request $request)
    {
        // Default waarden als ze niet zijn meegegeven
        $brand = $request->input('brand', '');
        $model = $request->input('model', '');
        $licensePlate = $request->input('license_plate', '');

        // Toon de view zonder redirect als er geen gegevens zijn
        return view('offers.create', compact('brand', 'model', 'licensePlate'));
    }

    public function store(Request $request){
        $newCar = new Car();
        $newCar->user_id = auth()->id();
        $newCar->license_plate = $request->license_plate;
        $newCar->brand = $request->brand;
        $newCar->model = $request->model;
        $newCar->price = $request->price;
        $newCar->mileage = $request->mileage;
        $newCar->seats = $request->seats;
        $newCar->doors = $request->doors;
        $newCar->production_year = $request->production_year;
        $newCar->weight = $request->weight;
        $newCar->color = $request->color;
        $newCar->image = $request->image;
        $newCar->sold_at = $request->sold_at;
        $newCar->save();
        return redirect()->route('cars.offers');
    }

    public function edit(Car $car){
        return view('offers.edit', ['car' => $car]);
    }

    public function update(Request $request, Car $car){
        $car->license_plate = $request->license_plate;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->price = $request->price;
        $car->mileage = $request->mileage;
        $car->seats = $request->seats;
        $car->doors = $request->doors;
        $car->production_year = $request->production_year;
        $car->weight = $request->weight;
        $car->color = $request->color;
        $car->image = $request->image;
        $car->sold_at = $request->sold_at;
        $car->save();
        return redirect()->route('cars.offers');
    }

    public function destroy(Car $car){
        $car->delete();
        return redirect()->route('cars.offers');
    }

    public function show(Car $car)
    {
        return view('offers.show', compact('car'));
    }


}
