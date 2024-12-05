<?php

namespace App\Http\Livewire\Pago;

use Livewire\Component;
use App\Models\Reunion;

class ShowReunion extends Component
{
    public $reunionId;
    public $pagos;

    public function mount($reunionId)
    {
        $this->reunionId = $reunionId;
        $this->pagos = Reunion::find($reunionId)->pagos;
    }

    public function render()
    {
        return view('livewire.pago.show-reunion');
    }
}
