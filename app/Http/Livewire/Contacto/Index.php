<?php

namespace App\Http\Livewire\Contacto;

use Livewire\Component;
use App\Models\Contacto;

class Index extends Component
{
    public $contactos;

    public function render()
    {
        $this->contactos = Contacto::All();
        return view('livewire.contacto.index');
    }
}
