<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Contacto;
use App\Models\Direccion;
use App\Models\Reunion;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Eventos - Online Store";
        $viewData["eventos"] = Evento::all();
        $viewData["clientes"] =  DB::table('contactos as c')
            ->selectRaw('c.id')
            ->selectRaw('CONCAT(c.apodo,"(",c.telefono,")") AS full_apodo')
            ->get(); 
        return view('evento.index')->with("viewData", $viewData);
    }

    public function list(){
        $eventos = Evento::all();
        return response()->json($eventos);
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
        request()->validate(Evento::$rules);
        $evento = Evento::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        $contactos= DB::table('contactos as c')
            ->selectRaw('c.id')
            ->selectRaw('CONCAT(c.apodo," (",c.telefono,")") AS full_apodo')
            ->get();
        $response = [
            'id' => $evento->getId(),
            'title' => $evento->title,
            'start' => $evento->start,
            'end' => $evento->end,
            'contacto_id' => $evento->eventoable->direccion->contacto->id,
            'clientes' => $contactos,
            'direccion_id' => $evento->eventoable->direccion->id,
        ];
        return response()->json($response); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);       
        //$evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
        //$evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');
        $contactos= DB::table('contactos as c')
            ->selectRaw('c.id')
            ->selectRaw('CONCAT(c.apodo," (",c.telefono,")") AS full_apodo')
            ->get();
        $response = [
            'id' => $evento->getId(),
            'title' => $evento->title,
            'start' => $evento->start,
            'end' => $evento->end,
            'clientes' => $contactos,
            'direccion_id' => $evento->eventoable->direccion->id,
            'contacto_id' => $evento->eventoable->direccion->contacto->id,
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d'),
            'time' => Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('H:i'),
            'duration' => "02:00",
            't_entradas' => $evento->eventoable->t_entradas,
            'p_entrada' => $evento->eventoable->p_entrada,
            'n_personas' => $evento->eventoable->n_personas,
            'estado' => $evento->eventoable->estado,
            'estados' => Reunion::getEstados(),
            'chicas' => $evento->eventoable->chicas,
            'prepago' => $evento->eventoable->prepago,
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);
        $evento->update($request->all());
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        return response()->json($evento);
    }
}
