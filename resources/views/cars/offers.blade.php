@extends('layouts.crud')

@section('title', 'Overzicht van alle auto’s')
@section('header', 'Aangeboden auto’s')

@section('content')
    @livewire('car-search') {{-- alleen de zoekbalk wordt hier geladen --}}

    <div class="row g-4 mt-4" id="car-results">
        @forelse ($cars as $car)
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

                        <a href="{{ route('offers.show', $car->id) }}" class="btn btn-primary btn-sm mt-3">Bekijk Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Geen auto's gevonden...</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $cars->links('pagination::bootstrap-5') }}
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

    .card-img-top {
        object-fit: cover;
        height: 300px;
        width: 100%;
        border-radius: 8px 8px 0 0;
        margin-bottom: 15px;
        object-position: center;
    }

    .card-body {
        flex-grow: 1;
        padding: 20px;
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

    @media (max-width: 768px) {
        .card-img-top {
            height: 180px;
        }
    }
</style>
@endsection
