@extends('layouts.crud')

@section('title', 'Mijn aangeboden auto’s')
@section('header', 'Mijn aangeboden auto’s')

@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kenteken</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Prijs</th>
                <th>Verkocht</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->license_plate }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>€{{ number_format($car->price, 2, ',', '.') }}</td>
                    <td>
                        @if ($car->sold_at)
                            Verkocht
                        @else
                            Niet verkocht
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('offers.edit', $car->id) }}" class="btn btn-warning btn-sm">Aanpassen</a>
                        <form action="{{ route('offers.destroy', $car->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
