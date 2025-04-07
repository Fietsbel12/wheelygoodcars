@extends('layouts.crud')

@section('title', 'Overzicht van alle auto’s')
@section('header', 'Aangeboden auto’s')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100 d-flex flex-column">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Afbeelding van {{ $car->brand }} {{ $car->model }}">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                        <p class="card-text"><strong>Prijs:</strong> €{{ number_format($car->price, 2, ',', '.') }}</p>
                        <p class="card-text"><strong>Kleur:</strong> {{ $car->color }}</p>
                        <p class="card-text"><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
                        <p class="card-text"><strong>Kilometerstand:</strong> {{ $car->mileage }} km</p>

                        @auth
                            <div class="d-flex gap-2">
                                <a href="{{ route('offers.edit', $car->id) }}" class="btn btn-warning btn-sm">Aanpassen</a>
                                <form action="{{ route('offers.destroy', $car->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                                </form>
                            </div>
                        @endauth

                        <a href="{{ route('offers.show', $car->id) }}" class="btn btn-primary btn-sm mt-3">Bekijk Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


@section('styles')
    <style>
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            animation: fadeIn 0.8s ease-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .card-body {
            flex-grow: 1;
        }

        .btn {
            font-size: 0.875rem;
            padding: 5px 10px;
        }

        .d-flex {
            display: flex;
            gap: 10px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
