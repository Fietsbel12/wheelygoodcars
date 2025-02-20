@extends('layouts.app')
    @section('content')
        <div>
            <form action="{{route('offers.store')}}" method="POST">
                @csrf
                <label>Kenteken:</label>
                <input type="text" name="license_plate">

                <label>Merk:</label>
                <input type="text" name="brand">

                <label>Model:</label>
                <input type="text" name="model">

                <label>Prijs:</label>
                <input type="number" name="price">

                <label>Kilometerstand:</label>
                <input type="number" name="mileage">

                <label>Aantal zitplaatsen:</label>
                <input type="number" name="seats">

                <label>Aantal deuren:</label>
                <input type="number" name="doors">

                <label>Productie jaar:</label>
                <input type="number" name="production_year">

                <label>Gewicht:</label>
                <input type="number" name="weight">

                <label>Kleur van de auto:</label>
                <input type="text" name="color">

                <label>Foto:</label>
                <input type="text" name="image">

                <label>Verkocht:</label>
                <input type="date" name="sold_at">

                <input type="submit" value="Versturen">
            </form>
        </div>
@endsection
