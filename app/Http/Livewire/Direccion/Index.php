<?php

namespace App\Http\Livewire\Direccion;

use App\Models\Contacto;
use Livewire\Component;

class Index extends Component
{
    public Contacto $contacto;

    public function mount($contacto){
        $this->contacto = $contacto;
    }

    public function render()
    {
        return view('livewire.direccion.index');
    }
}
