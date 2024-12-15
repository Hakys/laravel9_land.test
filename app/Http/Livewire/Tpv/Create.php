<?php

namespace App\Http\Livewire\Tpv;

use Livewire\Component;
use App\Models\Tpv;
use Illuminate\Support\Str;

class Create extends Component
{
    public $amount;
    public $concepto;

    public function submit()
    {
        $this->validate([
            'amount' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
            'concepto' => 'required|string|max:255',
        ]);

        $key = Str::random(32); // Generar una clave única

        Tpv::create([
            'key' => $key,
            'amount' => $this->amount,
            'concepto' => $this->concepto,
        ]);

        //session()->flash('message', 'Pago Registrado con éxito.');

        $this->reset();

        // Emitir un evento para actualizar la tabla
        $this->emit('tpvAdded');
    }
    public function render()
    {
        return view('livewire.tpv.create');
    }
}
