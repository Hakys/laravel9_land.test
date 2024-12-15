<?php

namespace App\Http\Livewire\Direccion;

use App\Models\Contacto;
use App\Models\Direccion;
use Livewire\Component;

class Select2 extends Component
{
    public $direccion_id;
    public $contacto_id;
    public $contactos;
    public $contacto;
    public $direcciones=[];

    //protected $listeners = ['DireccionSelect2' => 'render'];

    public function mount($id=null){
        if($id){
            $this->direccion_id = $id;
            $direccion = Direccion::find($id); 
            $this->contacto = $direccion->contacto;
            $this->contacto_id = $this->contacto->getId();
            $this->direcciones = Direccion::where('contacto_id',$this->contacto_id)->get(); 
            $this->emitTo('ReunionShow','SetDireccion',$this->direccion_id); 
        }
    }

    public function updated(){
        $this->contacto = Contacto::findOrFail($this->contacto_id);
        $this->direcciones = Direccion::where('contacto_id',$this->contacto_id)->get();  
        $this->emitTo('ReunionShow','SetDireccion',$this->direccion_id); 
    }
    
    public function render(){
        $this->contactos = Contacto::orderBy('apodo')->get();        
        return view('livewire.direccion.select2');
    }

   
}
