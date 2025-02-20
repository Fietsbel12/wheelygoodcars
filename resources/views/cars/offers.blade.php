@extends('layouts.app')
    @section('content')
        <table>
            <thead>
                <th>ID</th>
                <th>Kenteken</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Prijs</th>
                <th>Kilometerstand</th>
                <th>Aantal zitplaatsen</th>
                <th>Aantal deuren</th>
                <th>Productie jaar</th>
                <th>Gewicht:</th>
                <th>Kleur van de auto</th>
                <th>Foto</th>
                <th>Verkocht</th>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{$car->id}}</td>
                        <td>{{$car->license_plate}}</td>
                        <td>{{$car->brand}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->price}}</td>
                        <td>{{$car->mileage}}</td>
                        <td>{{$car->seats}}</td>
                        <td>{{$car->doors}}</td>
                        <td>{{$car->production_year}}</td>
                        <td>{{$car->weight}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->image}}</td>
                        <td>{{$car->sold_at}}</td>
                        @auth
                        <td><a href="{{route('offers.edit', $car->id)}}">Aanpassen</a></td>
                        <td>
                            <form action="{{route('offers.destroy', $car->id)}}" method="POST">
                                @csrf
                                    @method('delete')
                                    <input type="submit" value="Verwijderen">
                            </form>
                        </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
