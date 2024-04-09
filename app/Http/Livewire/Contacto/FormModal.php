<?php

namespace App\Http\Livewire\Contacto;

use App\Models\Contacto;
use Livewire\Component;

class FormModal extends Component
{
    public $op="create";
    public $titleform ="Nuevo Contacto";
    public $apodo;
    public $telefono;
    public Contacto $contacto;
    public $to;

    public $rules;

    public function submit(){
        if($this->op=="create"){
            $this->validate();
            Contacto::create(['apodo'=>$this->apodo,'telefono'=>$this->telefono]);   
            if($this->to){
                return redirect()->route($this->to)->with('success', 'Nuevo Contacto Añadido.');
            }else{
                
            }         
        }else if($this->op=="edit"){
            $this->validate();
            $this->contacto->SetApodo($this->apodo);
            $this->contacto->SetTelefono($this->telefono);
            $this->contacto->save();
            return redirect()->route('contacto.show',$this->contacto->getTelefono())->with('success', 'Contacto Actualizado.');
        }
    }   

    public function close(){
        if($this->op=="create")
            $this->reset(['apodo','telefono']);
    }

    public function mount($op,Contacto $contacto = null){
        $this->op=$op;        
        if($this->op=="create"){
            $this->rules=[
                'apodo' => 'required|unique:contactos',
                'telefono' => 'required|unique:contactos',
            ];
            $this->titleform ="Nuevo Contacto";
        }else if(($this->op=="edit") && ($contacto)){  
            $this->contacto = $contacto;
            $this->rules=[
                'apodo' => 'required|unique:contactos,apodo,'.$contacto->getId(),
                'telefono' => 'required|unique:contactos,telefono,'.$contacto->getId(),
            ];
            $this->apodo = $contacto->getApodo();
            $this->telefono = $contacto->getTelefono();
            $this->titleform ="Editar Contacto: ".$this->telefono;
        }
    }

    public function render(){
        return view('livewire.contacto.form-modal');
    }
}
