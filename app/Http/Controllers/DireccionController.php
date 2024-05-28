<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request){ 
        Log::info($request->all());
        request()->validate(Direccion::$rules);
        $d = new Direccion();
        $d->contacto_id = $request->contacto_id;
        $d->setFull_name($request->full_name);
        $d->setDireccion($request->ladireccion);
        $d->setTelefono($request->eltelefono);
        $d->setCp($request->cp);
        $d->setPoblacion($request->poblacion);
        $d->setProvincia($request->provincia);
        $d->setPais($request->pais);
        $d->save();
        return response()->json(['direccion_id'=>$d->getId()]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
    //public function update(Request $request, $id){ 
        Log::info($request->all());
        $d = Direccion::where('id',$id)->first();
        //$d = Direccion::where('id',$request->direccion_id)->first();
        request()->validate(Direccion::$rules);
        $d->update([
            'contacto_id' => $request->contacto_id,
            'full_name' => $request->full_name,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'cp' => $request->cp,
            'poblacion' => $request->poblacion,
            'provincia' => $request->provincia,
            'pais' => $request->pais,
        ]);
        return response()->json(['direccion_id'=>$d->getId()]);
    } 


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show($direccion_id)
    {
        $direccion = Direccion::find($direccion_id);
        $response = [
            'full_name' => $direccion->full_name,
            'ladireccion' => $direccion->direccion,
            'telefono' => $direccion->telefono,
            'cp' => $direccion->cp,
            'poblacion' => $direccion->poblacion,
            'provincia' => $direccion->provincia,
            'pais' => $direccion->pais,
            'viaje' => $direccion->distance_text
                ." ".$direccion->duration_text,
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion)
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function delete(Direccion $direccion)
    {
       //
    }
}
