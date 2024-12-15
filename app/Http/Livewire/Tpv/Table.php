<?php

namespace App\Http\Livewire\Tpv;

use Livewire\Component;
use App\Models\Tpv;

class Table extends Component
{
    public $tpvs;
    public $selectedTpv;

    protected $listeners = ['tpvAdded' => 'refreshTpvs'];

    public function mount()
    {
        $this->tpvs = Tpv::all();
    }

    public function refreshTpvs()
    {
        $this->tpvs = Tpv::all();
    }

    public function deleteTpv($id)
    {
        Tpv::find($id)->delete();
        $this->tpvs = Tpv::all();
    }

    public function render()
    {
        return view('livewire.tpv.table');
    }
}
