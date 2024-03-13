<?php

namespace App\Http\Livewire\Contacto;

use App\Models\Contacto;
use Livewire\Component;

class Select2 extends Component
{
    public $contactos;
    public $contacto_id=0;

    public function render()
    {
        $this->contactos = Contacto::orderBy('apodo')->get();
        return view('livewire.contacto.select2');
    }
}
