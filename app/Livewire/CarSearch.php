<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class CarSearch extends Component {
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();  // Zorg ervoor dat de paginering wordt gereset als de zoekterm verandert
    }

    public function render()
    {
        $query = Car::query();

        // Filter auto's op merk of model als er een zoekterm is
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('brand', 'like', '%' . $this->search . '%')
                ->orWhere('model', 'like', '%' . $this->search . '%');
            });
        }

        // Haal de gefilterde auto's op met paginering
        $cars = $query->orderBy('created_at', 'desc')->paginate(9);

        // Retourneer de auto's naar de view
        return view('livewire.car-search', [
            'cars' => $cars,
        ]);
    }
}
