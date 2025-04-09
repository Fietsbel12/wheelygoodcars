@extends('layouts.crud')

@section('title', 'Overzicht van auto views')

@section('content')
<div class="container">
    <h1>Overzicht van auto views</h1>

    @if ($cars->isEmpty())
        <p>Er zijn geen auto's gevonden.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Views</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->views }}</td>
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
