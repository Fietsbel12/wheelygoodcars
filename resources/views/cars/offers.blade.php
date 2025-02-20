@extends('layouts.crud')

@section('title', 'Overzicht van alle auto’s')
@section('header', 'Aangeboden auto’s')

@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Kenteken</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Prijs</th>
                <th>Kilometerstand</th>
                <th>Zitplaatsen</th>
                <th>Deuren</th>
                <th>Productiejaar</th>
                <th>Gewicht</th>
                <th>Kleur</th>
                <th>Foto</th>
                <th>Verkocht</th>
                @auth
                    <th>Acties</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->license_plate }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>€{{ number_format($car->price, 2, ',', '.') }}</td>
                    <td>{{ $car->mileage }}</td>
                    <td>{{ $car->seats }}</td>
                    <td>{{ $car->doors }}</td>
                    <td>{{ $car->production_year }}</td>
                    <td>{{ $car->weight }} kg</td>
                    <td>{{ $car->color }}</td>
                    <td><img src="{{ $car->image }}" alt="Auto afbeelding" width="100"></td>
                    <td>{{ $car->sold_at }}</td>
                    @auth
                        <td>
                            <a href="{{ route('offers.edit', $car->id) }}" class="btn btn-warning btn-sm">Aanpassen</a>
                            <form action="{{ route('offers.destroy', $car->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
