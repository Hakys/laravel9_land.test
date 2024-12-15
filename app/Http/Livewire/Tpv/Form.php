<?php

namespace App\Http\Livewire\Tpv;

use Livewire\Component;
use App\Models\Tpv;
use Illuminate\Support\Str;

class Form extends Component
{
    public $card_number;
    public $card_holder;
    public $expiration_date;
    public $cvv;
    public $amount;

    public function submit()
    {
        $this->validate([
            'key' => 'required|string|max:32|unique:tpvs,key',
            'card_number' => 'required|string|max:16',
            'card_holder' => 'required|string|max:255',
            'expiration_date' => 'required|string|max:5',
            'cvv' => 'required|string|max:4',
            'amount' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        Tpv::create([
            'key' => $this->key,
            'card_number' => $this->card_number,
            'card_holder' => $this->card_holder,
            'expiration_date' => $this->expiration_date,
            'cvv' => $this->cvv,
            'amount' => $this->amount,
        ]);

        session()->flash('message', 'Pago realizado con éxito.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.tpv.form');
    }
}
