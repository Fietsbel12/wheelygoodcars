@extends('layouts.crud')

@section('content')
<div class="container">
    <h2>Zoek een auto</h2>

    <label for="license_plate">Kenteken</label>
    <input type="text" id="license_plate" name="license_plate" class="form-control" placeholder="Voer kenteken in">
    <button type="button" id="fetchCarData" class="btn btn-primary mt-2">Check gegevens</button>

    <div id="carInfo" class="mt-3 alert alert-info" style="display: none;">
        <h4>Gevonden gegevens:</h4>
        <p><strong>Merk:</strong> <span id="brand"></span></p>
        <p><strong>Model:</strong> <span id="model"></span></p>
        <p><strong>Bouwjaar:</strong> <span id="year"></span></p>

        <form action="{{ route('offers.create') }}" method="GET">
            <input type="hidden" name="brand" id="input_brand">
            <input type="hidden" name="model" id="input_model">
            <input type="hidden" name="year" id="input_year">
            <input type="hidden" name="license_plate" id="input_license_plate">

            <button type="submit" class="btn btn-primary">Verdere invoer</button>
        </form>
    </div>
</div>

<script>
document.getElementById("fetchCarData").addEventListener("click", function () {
    let licensePlate = document.getElementById("license_plate").value.trim();

    if (!licensePlate) {
        alert("Voer een kenteken in.");
        return;
    }

    let formattedPlate = licensePlate.replace(/-/g, '').toUpperCase();

    fetch(`/car-info/${formattedPlate}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert("Geen gegevens gevonden voor dit kenteken.");
                document.getElementById("carInfo").style.display = "none";
            } else {
                document.getElementById("brand").textContent = data.brand;
                document.getElementById("model").textContent = data.model;
                document.getElementById("year").textContent = data.year;

                document.getElementById("input_brand").value = data.brand;
                document.getElementById("input_model").value = data.model;
                document.getElementById("input_year").value = data.year;
                document.getElementById("input_license_plate").value = formattedPlate;

                document.getElementById("carInfo").style.display = "block";
            }
        })
        .catch(error => {
            console.error("Fout bij ophalen gegevens:", error);
            alert("Er is een probleem opgetreden. Probeer het later opnieuw.");
        });
});
</script>
@endsection
