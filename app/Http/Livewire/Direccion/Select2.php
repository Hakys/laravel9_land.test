<?php

namespace App\Http\Livewire\Direccion;

use App\Models\Contacto;
use App\Models\Direccion;
use Livewire\Component;

class Select2 extends Component
{
    public $contactos;
    public $contacto_id=0;
    public $contacto;

    public $direcciones=[];
    public $direccion_id=0;

    //protected $listeners = ['DireccionSelect2' => 'render'];

    public function updated(){
        $this->contacto = Contacto::find($this->contacto_id)->first();
        $this->direcciones = Direccion::where('contacto_id',$this->contacto_id)->get();  
        $this->emitTo('ReunionShow','SetDireccion',$this->direccion_id); 
    }
    
    public function render(){
        $this->contactos = Contacto::orderBy('apodo')->get();        
        return view('livewire.direccion.select2');
    }

   
}
