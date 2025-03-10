@extends('layouts.crud')

@section('title', 'Details van de auto')
@section('header', 'Details van de auto')

@section('content')

<div class="container">
    <!-- Auto details hier -->
    <div class="card p-4 shadow">
        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
        <p><strong>Prijs:</strong> €{{ number_format($car->price, 2, ',', '.') }}</p>
        <p><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
        <p><strong>Model:</strong> {{ $car->model }}</p>
        <p><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
        <p><strong>Kilometerstand:</strong> {{ $car->mileage }} km</p>
        <p><strong>Vraagprijs:</strong> €{{ $car->price }}</p>
        <p><strong>License Plate:</strong> {{ $car->license_plate }}</p>
        <p><strong>Kleur:</strong> {{ $car->color }}</p>
        <img src="{{ $car->image }}" class="card-img-top" alt="Auto afbeelding">
    </div>
@endsection

