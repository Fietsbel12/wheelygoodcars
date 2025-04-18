@extends('layouts.crud')

@section('title', 'Nieuw aanbod')
@section('header', 'Nieuw aanbod')

@section('content')

    <div class="container">
        <div class="card p-4 shadow">
            <!-- Progress Bar -->
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 0%;" id="progress-bar"></div>
            </div>

            <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data" id="offer-form">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kenteken:</label>
                    <input type="text" name="license_plate" class="form-control" value="{{ $licensePlate ?? old('license_plate') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Merk:</label>
                    <input type="text" name="brand" class="form-control" value="{{ $brand ?? old('brand') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Model:</label>
                    <input type="text" name="model" class="form-control" value="{{ $model ?? old('model') }}">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Zitplaatsen:</label>
                        <input type="number" name="seats" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Aantal deuren:</label>
                        <input type="number" name="doors" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Gewicht:</label>
                        <input type="number" name="weight" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jaar van productie:</label>
                        <input type="number" name="production_year" class="form-control" value="{{ request('year') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kleur:</label>
                        <input type="text" name="color" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kilometerstand:</label>
                    <div class="input-group">
                        <input type="number" name="mileage" class="form-control">
                        <span class="input-group-text">km</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vraagprijs:</label>
                    <div class="input-group">
                        <span class="input-group-text">€</span>
                        <input type="number" name="price" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="from-label" for="image">Foto:</label>
                    <div class="input-group">
                        <input type="file" name="image" accept="image/*">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Aanbod afronden</button>
            </form>
        </div>
    </div>

    <script>
        // Functie om de voortgangsbalk bij te werken
        const form = document.getElementById('offer-form');
        const progressBar = document.getElementById('progress-bar');
        const inputs = form.querySelectorAll('input');

        // Initialiseer de voortgangsbalk (zekerstellen dat de balk op 0% is bij laden)
        progressBar.style.width = '0%';

        // Update de voortgangsbalk
        function updateProgressBar() {
            let totalFields = inputs.length;
            let filledFields = 0;

            // Tel de ingevulde velden
            inputs.forEach(input => {
                if (input.type === 'file' && input.files.length > 0) {
                    filledFields += 1;  // File is ingevuld
                } else if (input.type !== 'file' && input.value !== '') {
                    filledFields += 1;  // Normaal veld is ingevuld
                }
            });

            // Bereken en update de voortgangsbalk
            let progress = (filledFields / totalFields) * 100;
            progressBar.style.width = `${progress}%`;
        }

        // Voeg event listeners toe aan de inputvelden
        inputs.forEach(input => {
            input.addEventListener('input', updateProgressBar);
        });
    </script>
@endsection
