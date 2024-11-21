<?php

namespace App\Http\Livewire\Contacto;

use Livewire\Component;
use App\Models\Contacto;

class Index extends Component
{
    public $letra = "";
    public $letras = [];
    public $numero = "__";
    public $numeros = [];
    public $search = "";
    public $contactos;

    public function updateSearch(){
        $this->search = "";
        $this->updatedSearch();
    }

    public function updatedSearch(){
        $this->letra = "";
        $this->letras = [];
        $this->numero = "__";
        $this->numeros = [];
        $this->updateIndice();
    }

    public function updatedNumero(){
        $this->letra = "";
        $this->letras = [];
        $this->updateIndice();
    }

    public function updatedLetra(){
        $this->updateIndice();
    }

    public function updateIndice(){
        if($this->search!=""){
            $this->contactos = Contacto::where(function($query){
                    $query->where('apodo','like','%'.$this->search.'%')
                    ->orwhere('telefono','like','%'.$this->search.'%');
                })
                ->where('apodo','like',$this->numero.'_'.$this->letra.'%')
                ->orderBy('apodo','asc')->get();
        }else{
            $this->contactos = Contacto::where('apodo','like',$this->numero.'_'.$this->letra.'%')
                ->orderBy('apodo','asc')->get();
        }
        foreach ($this->contactos as $contacto) {
            $this->numeros[] = $contacto->apodo[0].$contacto->apodo[1];
            if (ctype_alpha($contacto->apodo[3]))
                $this->letras[] = $contacto->apodo[3];
        }
        $this->numeros = array_unique($this->numeros);
        $this->letras = array_unique($this->letras);
        sort($this->numeros);
        sort($this->letras);
    }
    public function mount(){
        $this->updateIndice();
    }

    public function render(){
        return view('livewire.contacto.index');
    }
}
