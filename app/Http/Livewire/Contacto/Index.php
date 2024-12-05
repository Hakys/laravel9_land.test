<?php

namespace App\Http\Livewire\Contacto;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Contacto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = "";

    #[Url]
    public $numero = "";
    #[Url]
    public $letra = "";

    /*
    public $filas = 10;

    //public $letras = [];

    //public $numeros = [];

    //public $contactos;
*/
    public function resetNumero(){
        $this->numero = "";
        $this->resetPage();
    }

    public function resetLetra(){
        $this->letra = "";
        $this->resetPage();
    }

    public function resetSearch(){
        $this->search = "";
        $this->resetPage();
    }
/*
    public function updatedSearch(){
        $this->letra = "";
        //$this->letras = [];
        $this->numero = "__";
        //$this->numeros = [];
        $this->render();
    }

    public function updatedNumero(){
        $this->letra = "";
        //$this->letras = [];
        $this->render();
    }

    public function updatedLetra(){
        $this->submit();
    }
*/
    public function render(){
        if(empty($this->search) && empty($this->numero) && empty($this->letra)){
            $query = Contacto::orderBy('created_at','desc');
        }else{
            $query = Contacto::orderBy('apodo','asc');

            $query->when($this->search, function($q) use ($query){
                $q->where('apodo','like','%'.$this->search.'%')
                    ->orwhere('telefono','like','%'.$this->search.'%');
            });

            $query->when($this->numero, function($q) use ($query){
                $q->where('apodo','like',$this->numero.'%');
            });

            $query->when($this->letra, function($q) use ($query){
                $q->where('apodo','like','___'.$this->letra.'%');
            });

        }
        $contactos = $query->paginate(100);
        $numeros=[];
        $letras=[];
        foreach ($contactos as $contacto) {
            try{
                $palabras = preg_split("/[\s,.]+/",$contacto->getApodo());
                if($palabras==false) Log::info("Palabras: ".$contacto);
                else{
                    if(ctype_digit($palabras[0])){
                        $numeros[] = $palabras[0];
                        $letras[] = Str::upper($palabras[1][0]);
                    }else{
                        $letras[] = Str::upper($palabras[0][0]);
                    }
                }
            }catch(Exception $e){
                print_f($e->getMessage());
            }
        }
        $numeros = array_unique($numeros);
        $letras = array_unique($letras);
        sort($numeros);
        sort($letras);
        return view('livewire.contacto.index',[
            'numeros' => $numeros,
            'letras' => $letras,
            'contactos' => $contactos
        ]);
    }
}
