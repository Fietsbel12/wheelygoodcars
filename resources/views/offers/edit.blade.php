@extends('layouts.app')
    @section('content')
        <div>
            <form action="{{route('offers.update', $car->id)}}" method="POST">
                @csrf
                <label>Kenteken:</label>
                <input type="text" name="license_plate" value="{{$car->license_plate}}">

                <label>Merk:</label>
                <input type="text" name="brand" value="{{$car->brand}}">

                <label>Model:</label>
                <input type="text" name="model" value="{{$car->model}}">

                <label>Prijs:</label>
                <input type="number" name="price" value="{{$car->price}}">

                <label>Kilometerstand:</label>
                <input type="number" name="mileage" value="{{$car->mileage}}">

                <label>Aantal zitplaatsen:</label>
                <input type="number" name="seats" value="{{$car->seats}}">

                <label>Aantal deuren:</label>
                <input type="number" name="doors" value="{{$car->doors}}">

                <label>Productie jaar:</label>
                <input type="number" name="production_year" value="{{$car->production_year}}">

                <label>Gewicht:</label>
                <input type="number" name="weight" value="{{$car->weight}}">

                <label>Kleur van de auto:</label>
                <input type="text" name="color" value="{{$car->color}}">

                <label>Foto:</label>
                <input type="text" name="image" value="{{$car->image}}">

                <label>Verkocht:</label>
                <input type="date" name="sold_at" value="{{$car->sold_at}}">

                <input type="submit" value="Versturen">
            </form>
        </div>
@endsection
