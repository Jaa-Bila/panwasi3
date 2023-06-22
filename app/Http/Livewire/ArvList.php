<?php

namespace App\Http\Livewire;

use App\Models\PartcArv;
use Livewire\Component;
use Livewire\WithPagination;

class ArvList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.arv-list', [
            'partcs' => PartcArv::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('2')
        ]);
    }
}
