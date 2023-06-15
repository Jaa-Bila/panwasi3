<?php

namespace App\Http\Livewire;

use App\Models\PartcHamil;
use Livewire\Component;
use Livewire\WithPagination;

class HamilList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.hamil-list', [
            'partcs' => PartcHamil::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('2')
        ]);
    }
}
