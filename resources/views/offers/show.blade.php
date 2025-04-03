@extends('layouts.crud')

@section('title', 'Details van de auto')
@section('header', 'Details van de auto')

@section('content')


    <!-- Bootstrap toast ;33-->
    <div id="viewToast" class="toast position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 2000;">
        <div class="toast-header">
            <strong class="me-auto">Auto bekeken</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{$car->views}} klanten hebben deze auto bekeken.
        </div>
    </div>

    @section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                var toastEl = document.getElementById('viewToast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }, 10000);
        });
    </script>
    @endsection

    <div class="container">
        <div class="card p-4 shadow">
            <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5> <p>Aantal keer bekeken: {{ $car->views}}</p>
            <p><strong>Prijs:</strong> €{{ number_format($car->price, 2, ',', '.') }}</p>
            <p><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
            <p><strong>Model:</strong> {{ $car->model }}</p>
            <p><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
            <p><strong>Kilometerstand:</strong> {{ $car->mileage }} km</p>
            <p><strong>Vraagprijs:</strong> €{{ $car->price }}</p>
            <p><strong>License Plate:</strong> {{ $car->license_plate }}</p>
            <p><strong>Kleur:</strong> {{ $car->color }}</p>

            <!-- Knop om PDF te genereren -->
            <form action="{{ url('/car/' . $car->id . '/pdf') }}" method="GET">
                <button type="submit" class="btn btn-primary">Genereer PDF</button>
            </form>
            <img src="{{ $car->image }}" class="card-img-top" alt="Auto afbeelding">
        </div>
    </div>
@endsection

