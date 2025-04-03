<!DOCTYPE html>
<html>
<head>
    <title>Auto Gegevens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1 class="title">{{ $car->brand }} - {{ $car->model }} ({{ $car->license_plate }})</h1>

    <table class="table">
        <tr>
            <th>Kenteken</th>
            <td>{{ $car->license_plate }}</td>
        </tr>
        <tr>
            <th>Merk</th>
            <td>{{ $car->brand }}</td>
        </tr>
        <tr>
            <th>Model</th>
            <td>{{ $car->model }}</td>
        </tr>
        <tr>
            <th>Prijs</th>
            <td>€ {{ number_format($car->price, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Kilometerstand</th>
            <td>{{ number_format($car->mileage, 0, ',', '.') }} km</td>
        </tr>
        <tr>
            <th>Jaar</th>
            <td>{{ $car->production_year }}</td>
        </tr>
        <tr>
            <th>Kleur</th>
            <td>{{ $car->color }}</td>
        </tr>
    </table>

</body>
</html>
