@extends('layouts.crud')

@section('title', 'Opvallende Aanbieders')

@section('content')
<div class="container">
    <h1>Opvallende Aanbieders</h1>

    @if ($susSellers->isEmpty())
        <p>Geen opvallende aanbieders gevonden.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Reden</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($susSellers as $seller)
                    <tr>
                        <td>{{ $seller->name }}</td>
                        <td>{{ $seller->email }}</td>
                        <td>{{ $seller->phone_number ?? 'Niet ingevuld' }}</td>
                        <td>
                            @if (empty($seller->phone_number))
                                Geen telefoonnummer ingevuld
                            @elseif ($seller->cars->contains(function ($car) {
                                return $car->production_year < 2005 && $car->mileage < 50000;
                            }))
                                Auto's met hoge leeftijd en lage kilometerstand
                            @elseif ($seller->cars->where('created_at', '>=', now()->startOfDay())
                                ->where('sold_at', true)
                                ->where('price', '>', 10000)
                                ->count() > 3)
                                Meer dan 3 auto's direct verkocht met prijs boven 10.000€
                            @elseif ($seller->cars->count() > 0 && $seller->cars->every(fn ($car) => $car->price < 1000))
                                Auto's onder 1.000€ (te mooi om waar te zijn)
                            @elseif ($seller->cars->every(fn ($car) => $car->tags->count() === 0))
                                Geen tags in gebruik
                            @elseif (!$seller->cars->contains(function ($car) {
                                return $car->created_at >= now()->subYear();
                            }))
                                Al een jaar geen nieuwe auto's aangeboden
                            @else
                                Geen opvallende kenmerken
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

@section('styles')
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
@endsection
