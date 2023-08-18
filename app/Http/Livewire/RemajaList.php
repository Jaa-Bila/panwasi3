<?php

namespace App\Http\Livewire;

use App\Models\PartcRemaja;
use Livewire\Component;
use Livewire\WithPagination;

class RemajaList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.remaja-list', [
            'partcs' => PartcRemaja::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10')
        ]);
    }
}
