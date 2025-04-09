<div>
    <div class="mb-4">
        <input type="text" class="form-control" placeholder="Zoek op merk of model..." wire:model.debounce.500ms="search">
    </div>

    <div class="row g-4">
        @foreach ($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100 d-flex flex-column">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Afbeelding van {{ $car->brand }} {{ $car->model }}">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                        <p class="card-text"><strong>Prijs:</strong> €{{ number_format($car->price, 2, ',', '.') }}</p>
                        <p class="card-text"><strong>Kleur:</strong> {{ $car->color }}</p>
                        <p class="card-text"><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
                        <p class="card-text"><strong>Kilometerstand:</strong> {{ $car->mileage }} km</p>

                        <a href="{{ route('offers.show', $car->id) }}" class="btn btn-primary btn-sm mt-3">Bekijk Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $cars->links('pagination::bootstrap-5') }}
    </div>
</div>
