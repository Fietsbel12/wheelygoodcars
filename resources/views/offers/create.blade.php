@extends('layouts.crud')

@section('title', 'Voeg een nieuwe auto toe')
@section('header', 'Nieuwe auto toevoegen')

@section('content')
    <div class="card p-4 shadow">
        <form action="{{ route('offers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kenteken:</label>
                <input type="text" name="license_plate" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Merk:</label>
                <input type="text" name="brand" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Model:</label>
                <input type="text" name="model" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Prijs:</label>
                <input type="number" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Kilometerstand:</label>
                <input type="number" name="mileage" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Aantal zitplaatsen:</label>
                <input type="number" name="seats" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Aantal deuren:</label>
                <input type="number" name="doors" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Productiejaar:</label>
                <input type="number" name="production_year" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Gewicht:</label>
                <input type="number" name="weight" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Kleur:</label>
                <input type="text" name="color" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto URL:</label>
                <input type="text" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Verkocht op:</label>
                <input type="date" name="sold_at" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
