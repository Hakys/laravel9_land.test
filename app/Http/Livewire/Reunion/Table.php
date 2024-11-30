<?php

namespace App\Http\Livewire\Reunion;

use App\Models\Reunion;
use Livewire\Component;

class Table extends Component
{
    public $reunions;

    public function render()
    {
        $this->reunions = Reunion::orderBy('fecha','desc')->orderBy('hora','asc')->get();
        return view('livewire.reunion.table');
    }
}
