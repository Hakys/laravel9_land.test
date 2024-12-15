<?php

namespace App\Http\Controllers;

use App\Models\Tpv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class TpvController extends Controller
{
    public function landing($key=null){
        $viewData["title"] = "Diabla Roja";
        $viewData["subtitle"] = "Pasarela de Pago";
        $viewData["tpv"] = Tpv::where('key', $key)->firstOrFail();
        return view("tpv.pasarela")->with("viewData", $viewData);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData["title"] = "Diabla Roja";
        $viewData["subtitle"] = "Pagos por TPV";
        return view("tpv.index")->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tpv  $tpv
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        $viewData["title"] = "Diabla Roja";
        $viewData["subtitle"] = "Pasarela de Pago";
        $viewData["tpv"] = Tpv::where('key', $key)->firstOrFail();
        return view('tpv.show', compact('tpv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tpv  $tpv
     * @return \Illuminate\Http\Response
     */
    public function edit(Tpv $tpv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tpv  $tpv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {
        $viewData["title"] = "Diabla Roja";
        $viewData["subtitle"] = "Pasarela de Pago";
        $payment = Tpv::where('key', $key)->firstOrFail();
        Log::info("UPDATE: ".$request->card_number.$request->card_holder.$request->expiration_date.$request->cvv.$payment->id);
        $request->validate([
            'key' => Rule::unique('tpvs')->ignore($payment->id), //'required|string|max:32',
            'card_number' => 'required|digits:16',
            'card_holder' => 'required|string|max:255',
            //'expiration_date' => 'required|regex:/^(0[1-9]|1[0-2])\/([0-9]{2})$/',
            'expiration_date' => 'required|regex:^\d{1,2}\/\d{1,2}^',
            'cvv' => 'required|digits:3',
        ]);

        $payment->update([
            'card_number' => (string) $request->card_number,
            'card_holder' => (string) $request->card_holder,
            'expiration_date' => (string) $request->expiration_date,
            'cvv' => (string) $request->cvv,
            'pagado' => true,
        ]);
        return view('tpv.salida')
            ->with("viewData", $viewData)
            ->with('message', 'Pago Realizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tpv  $tpv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tpv $tpv)
    {
        //
    }
}
