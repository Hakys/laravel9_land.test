<?php

namespace App\Http\Livewire\Reunion;

use App\Models\Direccion;
use App\Models\Evento;
use Livewire\Component;
use App\Models\Reunion;
use Illuminate\Support\Carbon;

class Show extends Component
{
    public $direccion_id;
    public $reunion;

    public $fecha;
    public $poblacion;
    public $provincia;
    public $n_personas=7;
    public $p_entrada=5;
    public $t_entradas=0;
    public $prepago=0;
    public $chicas=1;
    public $estado = "solicitada";
    public $estados;

    public $edit = false;

    protected $listeners = ['ReunionShow' => 'SetDireccion'];

    public $rules;

    public function mount($id=null,$date=null){
        if($id){
            $this->edit=true;
            $this->reunion = Reunion::find($id);
            $this->direccion_id = $this->reunion->direccion_id;
            $this->SetDireccion($this->direccion_id);
            $this->fecha = $this->reunion->getFecha();
            $this->n_personas = $this->reunion->getN_personas();
            $this->p_entrada = $this->reunion->getP_entrada();
            $this->t_entradas = $this->reunion->getT_entradas();
            $this->prepago = $this->reunion->getPrepago();
            $this->estado = $this->reunion->getEstado();
            $this->chicas = $this->reunion->getChicas();
            $this->rules['id'] = "required|exists:reunions,id";
        }
        if($date)
            $this->fecha = $date;
    }

    public function SetDireccion($value){
        $this->direccion_id = $value;
        $dir = Direccion::find($value);
        $this->poblacion = $dir->getPoblacion();
        $this->provincia = $dir->getProvincia();
    }

    public function render()
    {   
        $this->rules = [
            'direccion_id' => 'required|exists:direccions,id',
            'fecha' => 'required|date',
            'n_personas' => 'required|integer|min:0',
            'p_entrada' => 'required|numeric|min:0',
            't_entradas' => 'required|numeric|min:0',
            'estado' => 'required',
        ];
        $this->estados = Reunion::getEstados();
        return view('livewire.reunion.show');
    }

    public function submit(){ 
        
        $this->validate();
        $reunion = Reunion::create([
            'direccion_id' => $this->direccion_id,
            'fecha' => $this->fecha,
            'chicas' => $this->chicas,
            'prepago' => $this->prepago,
            'n_personas' => $this->n_personas,
            'p_entrada' => $this->p_entrada,
            't_entradas' => $this->t_entradas,
            'estado' => $this->estado,
        ]);
        $end = new Carbon($reunion->fecha);
        Evento::create([
            'title' => $reunion->direccion->provincia,
            'start' => $reunion->fecha,
            'end' => $end->addHours(2),
        ]);
        $msg = 'Nueva Reunión Añadida.';
        return redirect()->route('reunion.index')->with('success', $msg);   
    }
}
