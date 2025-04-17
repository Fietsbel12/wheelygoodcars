@extends('layouts.crud')
    @section('content')
        <div class="card p-4 shadow">
            <form action="{{route('offers.update', $car->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Kenteken:</label>
                    <input type="text" name="license_plate" value="{{$car->license_plate}}">
                </div>

                <div class="mb-3">

                    <label>Merk:</label>
                    <input type="text" name="brand" value="{{$car->brand}}">
                </div>

                <div class="mb-3">
                    <label>Model:</label>
                    <input type="text" name="model" value="{{$car->model}}">
                </div>

                <div class="mb-3">
                    <label>Prijs:</label>
                    <input type="number" name="price" value="{{$car->price}}">
                </div>

                <div class="mb-3">
                    <label>Kilometerstand:</label>
                    <input type="number" name="mileage" value="{{$car->mileage}}">
                </div>

                <div class="mb-3">
                    <label>Aantal zitplaatsen:</label>
                    <input type="number" name="seats" value="{{$car->seats}}">
                </div>

                <div class="mb-3">
                    <label>Aantal deuren:</label>
                    <input type="number" name="doors" value="{{$car->doors}}">
                </div>

                <div class="mb-3">
                    <label>Productie jaar:</label>
                    <input type="number" name="production_year" value="{{$car->production_year}}">
                </div>

                <div class="mb-3">
                    <label>Gewicht:</label>
                    <input type="number" name="weight" value="{{$car->weight}}">
                </div>

                <div class="mb-3">
                    <label>Kleur van de auto:</label>
                    <input type="text" name="color" value="{{$car->color}}">
                </div>

                <div class="mb-3">
                    <label>Foto:</label>
                    <input type="file" name="image" accept="image/*"value="{{$car->image}}">
                </div>


                <div class="mb-3">
                    <label>Verkocht:</label>
                    <input type="date" name="sold_at" value="{{$car->status}}">
                </div>

                <input type="submit" class="btn btn-warning btn-sm" value="Aanpassen">
            </form>
        </div>
@endsection
