<style>
    /* Algemene animatie voor fade-in */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        animation: fadeIn 0.8s ease-out;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover-effect: kaart iets groter maken */
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    </style>

@extends('layouts.crud')

@section('title', 'Overzicht van alle auto’s')
@section('header', 'Aangeboden auto’s')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ $car->image }}" class="card-img-top" alt="Auto afbeelding">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                        <p class="card-text"><strong>Prijs:</strong> €{{ number_format($car->price, 2, ',', '.') }}</p>
                        <p class="card-text"><strong>Kleur:</strong> {{ $car->color }}</p>
                        <p class="card-text"><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
                        <p class="card-text"><strong>Kilometerstand:</strong> {{ $car->mileage }} km</p>

                        @auth
                            <a href="{{ route('offers.edit', $car->id) }}" class="btn btn-warning btn-sm">Aanpassen</a>
                            <form action="{{ route('offers.destroy', $car->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection



