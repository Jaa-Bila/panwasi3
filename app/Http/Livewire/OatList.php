<?php

namespace App\Http\Livewire;

use App\Models\PartcOat;
use Livewire\Component;
use Livewire\WithPagination;


class OatList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.oat-list', [
            'partcs' => PartcOat::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('2')
        ]);
    }
}
