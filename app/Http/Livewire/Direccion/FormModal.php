<?php

namespace App\Http\Livewire\Direccion;

use App\Models\Contacto;
use Livewire\Component;
use App\Models\Direccion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FormModal extends Component
{
    public $op;
    public $titleform;
    public $recoge = false;
    public $id_dir;
    public $to;

    public $full_name;
    public $telefono;
    public $email;
    public $nif;
    public $ladireccion;
    public $cp;
    public $poblacion;
    public $provincia;
    public $pais;
    public $contacto_id;
    
    public Contacto $contacto;
    public Direccion $direccion;

    public $rules;

    public function render()
    {
        return view('livewire.direccion.form-modal');
    }

    public function close(){
        if($this->op=="create")
            $this->reset(['full_name', 'telefono', 'email', 'nif', 'ladireccion', 'cp', 'poblacion', 'provincia', 'pais']);
    }

    public function mount($op, Contacto $contacto, Direccion $direccion = null){
        $this->op = $op;      
        $this->contacto = $contacto;        
        $this->contacto_id = $contacto->getId();
        $this->rules = [
            'full_name' => 'required',
            'telefono' => 'required',                
            'ladireccion' => 'required',                
            'poblacion' => 'required',                
            'contacto_id' => 'required|exists:contactos,id'
        ]; 
        if($this->op=="create"){
            $this->titleform ="Nueva Dirección para ".$this->contacto->getApodo();              
            $this->telefono = $this->contacto->getTelefono();
            $this->full_name = $this->contacto->getApodo();
        }else if(($this->op=="edit")&& ($direccion)){  
            $this->titleform ="Editar Dirección de ".$this->contacto->getApodo();
            $this->direccion = $direccion;
            $this->id_dir = $direccion->getId();  
            $this->telefono = $direccion->getTelefono();          
            $this->full_name = $direccion->getFull_name();
            $this->ladireccion = $direccion->getDireccion();
            $this->cp = $direccion->getCp();
            $this->poblacion = $direccion->getPoblacion();
            $this->provincia = $direccion->getProvincia();
            $this->pais = $direccion->getPais();
            $this->nif = $direccion->getNif();
            $this->email = $direccion->getEmail();
        }
    }

    public function updatedRecoge($value){
        if($value){
            if($this->op=="create"){
                $this->telefono = $this->contacto->getTelefono();
                $this->full_name = $this->contacto->getApodo();
            }else if($this->op=="edit"){
                $this->telefono = $this->direccion->getTelefono();
                $this->full_name = $this->direccion->getFull_name();   
            }            
            $this->ladireccion = 'Recoge'; 
            $this->poblacion = 'Huelva';
            $this->reset(['cp','provincia','pais','email','nif']);
        }else{
            if($this->op=="create"){
                $this->reset(['ladireccion','poblacion']);
            }else if($this->op=="edit"){
                $this->full_name = $this->direccion->getFull_name();
                $this->telefono = $this->direccion->getTelefono();
                $this->ladireccion = $this->direccion->getDireccion();
                $this->cp = $this->direccion->getCp();
                $this->poblacion = $this->direccion->getPoblacion();
                $this->provincia = $this->direccion->getProvincia();
                $this->pais = $this->direccion->getPais();
                $this->nif = $this->direccion->getNif();
                $this->email = $this->direccion->getEmail();
            }
        }
    }

    public function submit(){        
        if($this->op=="create"){
            $this->validate();
            $d = Direccion::create([
                'full_name' => $this->full_name,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'nif' => $this->nif,
                'direccion' => $this->ladireccion,
                'cp' => $this->cp,
                'poblacion' => $this->poblacion,
                'provincia' => $this->provincia,
                'pais' => $this->pais,
                'contacto_id' => $this->contacto->getId(),
            ]);
            $d->setMatrix();
            $d->save();
            $msg = 'Nueva Dirección Añadida.';
            return redirect()->route($this->to,$this->contacto->getTelefono())->with('success', $msg);            
        }else if($this->op=="edit"){
            $this->validate();            
            $this->direccion->setFull_name($this->full_name);
            $this->direccion->setTelefono($this->telefono);
            $this->direccion->setDireccion($this->ladireccion);
            $this->direccion->setCp($this->cp);
            $this->direccion->setPoblacion($this->poblacion);
            $this->direccion->setProvincia($this->provincia);
            $this->direccion->setPais($this->pais);
            $this->direccion->setNif($this->nif);
            $this->direccion->setEmail($this->email);
            $this->direccion->setMatrix();
            $this->direccion->save();
            $msg = "Dirección Actualizada.";
            return redirect()->route('contacto.show',$this->contacto->getTelefono())->with('success', $msg);
        }
        
    }
    
    public function delete(){
        Direccion::destroy($this->direccion->getId());
        return redirect()->route('contacto.show',$this->contacto->getTelefono())->with('success', 'Dirección Borrada.');
    }       
}
