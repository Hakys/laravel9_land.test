<?php

namespace App\Http\Livewire\Tpv;

use Livewire\Component;
use App\Models\Tpv;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class Pasarela extends Component
{
    public $key;
    public $amount;
    public $concepto;
    public $card_number;
    public $card_holder;
    public $expiration_date;
    public $cvv;
    public $pedido;

    public function mount($key){
        $tpv = Tpv::where('key',$key)->firstOrFail();
        $this->key = $key;
        $this->amount = $tpv->amount;
        $this->concepto = $tpv->concepto;
        //$this->card_number = $tpv->card_number;
        //$this->card_holder = $tpv->card_holder;
        //$this->expiration_date = $tpv->expiration_date;
        //$this->cvv = $tpv->cvv;
        $this->pagado = $tpv->pagado;
        $created_at = Carbon::parse($tpv->created_at);
        $this->pedido = "00".$created_at->format('imsd');
    }

    public function submit(){

        $payment = Tpv::where('key', $this->key)->firstOrFail();
        //Log::info("submit: ".$this->card_number.$this->card_holder.$this->expiration_date.$this->cvv.$payment->id);

        $this->validate([
            'key' => Rule::unique('tpvs','key')->ignore($payment->id), //'required|string|max:32',
            'card_number' => 'required|digits:16',
            'card_holder' => 'required|string|max:255',
            //'expiration_date' => 'required|regex:/^(0[1-9]|1[0-2])\/([0-9]{2})$/',
            'expiration_date' => 'required|regex:^\d{1,2}\/\d{1,2}^',
            'cvv' => 'required|digits:3',
        ]);

        $values = [
            'card_number' => $this->card_number,
            'card_holder' => $this->card_holder,
            'expiration_date' => $this->expiration_date,
            'cvv' => $this->cvv,
            'pagado' => true,
        ];

        $payment->update($values);

        return redirect()->route('tpv.landing',['key' => $this->key]);
    }

    public function render()
    {
        return view('livewire.tpv.pasarela');
    }
}
