<?php

namespace App\Http\Livewire\Tpv;

use Livewire\Component;
use App\Models\Tpv;
use Illuminate\Http\Request;

class Pasarela extends Component
{
    public $key;
    public $amount;
    public $concepto;

    public function mount($key){
        $this->key = $key;
        $tpv = Tpv::where('key',$key)->firstOrFail();
        $this->amount = $tpv->amount;
        $this->concepto = $tpv->concepto;
    }

    public function render()
    {
        return view('livewire.tpv.pasarela');
    }
}
