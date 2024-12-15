<?php

namespace App\Http\Controllers;

use App\Models\Tpv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TpvController extends Controller
{
    public function landing($key=null){
        $viewData["title"] = "Diabla Roja";
        $viewData["subtitle"] = "Pasarela de Pago";
        $viewData["tpv"] = Tpv::where('key', $key)->firstOrFail();
        if($viewData['tpv']->pagado)
            return view("tpv.salida")->with("viewData", $viewData);
        else
            return view("tpv.landing")->with("viewData", $viewData);
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
        $viewData["subtitle"] = "Detalles del Pago";
        $viewData["tpv"] = Tpv::where('key', $key)->firstOrFail();
        return view('tpv.show')->with("viewData", $viewData);
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
    public function update(Request $request, Tpv $tpv)
    {
//
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
