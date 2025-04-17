<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class CarSearch extends Component {
    use WithPagination;

    public $search = '';

    public function render(){
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Car::where('brand', 'like', '%' . $this->search . '%')
                ->orWhere('model', 'like', '%' . $this->search . '%')
                ->whereNull('sold_at')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        } else {
            $results = Car::whereNull('sold_at')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        }

        return view('livewire.car-search', [
            'cars' => $results
        ]);
    }


    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }


}
