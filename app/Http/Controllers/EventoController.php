<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Contacto;
use App\Models\Direccion;
use App\Models\Reunion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        Log::info($request->all());
        request()->validate(Evento::$rules);
        if(!$request->direccion_id){
            if(!$request->contacto_id){
                request()->validate(Contacto::$rules);
                $contacto = new Contacto();
                $contacto->setApodo($request->apodo);
                $contacto->setTelefono($request->telefono);
                $contacto->save();
                $request->merge([
                    'contacto_id' => $contacto->getId(),
                ]);
                Log::info($request->all());
            }
            request()->validate(Direccion::$rules);
            $direccion = new Direccion();
            $direccion->setFull_name($request->full_name);
            $direccion->setTelefono($request->telefono);
            $direccion->setDireccion($request->ladireccion);
            $direccion->setCp($request->cp);
            $direccion->setPoblacion($request->poblacion);
            $direccion->setProvincia($request->provincia);
            $direccion->setPais($request->pais);
            $direccion->contacto_id = $request->contacto_id;
            $direccion->setMatrix();
            $direccion->save();
            $request['direccion_id'] = $direccion->getId();
        }
        request()->validate(Reunion::$rules);
        $reunion = new Reunion();
        $reunion->fecha = $request->fecha;
        $reunion->hora = $request->hora;
        $reunion->direccion_id = $request->direccion_id;
        $reunion->n_personas = $request->integer('n_personas');
        $reunion->p_entrada = $request->integer('p_entrada');
        $reunion->t_entradas = $request->integer('t_entradas');
        $reunion->estado = $request->estado;
        $reunion->prepago = $request->boolean('prepago');
        $reunion->chicas = $request->boolean('chicas');
        $reunion->save();

        $evento = new Evento();
        $evento->title = $request->title;        
        $evento->setStart($request->fecha,$request->hora);
        $evento->setEnd($request->fecha,$request->hora,$request->duration);
        //$evento->eventoable()->save($reunion);        
        $reunion->evento()->save($evento); 
        $evento->save();
        //$reunion->refresh();
        return response()->json($request); 
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
        $response = [
            'id' => $evento->getId(),
            'title' => $evento->title,
            'start' => $evento->start,
            'end' => $evento->end,
            'contacto_id' => $evento->eventoable->direccion->contacto->id,
            'clientes' => Contacto::getDatalist(),
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
        ->selectRaw('CONCAT(c.apodo," (",c.telefono,")") AS apodo')
        ->get();
    $response = [];
        $response = [
            'id' => $evento->getId(),
            'title' => $evento->title,
            'start' => $evento->start, 
            'end' => $evento->end,
            'clientes' => Contacto::getDatalist(),
            'direccion_id' => $evento->eventoable->direccion->id,
            'full_name' => $evento->eventoable->direccion->full_name,
            'ladireccion' => $evento->eventoable->direccion->direccion,
            'cp' => $evento->eventoable->direccion->cp,
            'poblacion' => $evento->eventoable->direccion->poblacion,
            'provincia' => $evento->eventoable->direccion->provincia,
            'pais' => $evento->eventoable->direccion->pais,
            'contacto_id' => $evento->eventoable->direccion->contacto->id,
            'direccions' => $evento->eventoable->direccion->contacto->direccions,
            'fecha' => Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d'),
            'hora' => Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('H:i'),
            'duration' => "02:00",
            't_entradas' => $evento->eventoable->t_entradas,
            'p_entrada' => $evento->eventoable->p_entrada,
            'n_personas' => $evento->eventoable->n_personas,
            'estado' => $evento->eventoable->estado,
            'estados' => Reunion::getEstados(),
            'chicas' => $evento->eventoable->chicas,
            'prepago' => $evento->eventoable->prepago,
            'viaje' => $evento->eventoable->direccion->distance_text
                ." ".$evento->eventoable->direccion->duration_text,
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
        //Log::info(now()." ".$request);
        $reunion = Reunion::find($evento->eventoable->getId());
        $reunion->fecha = $request->fecha;
        $reunion->hora = $request->hora;
        $evento->setStart($reunion->fecha,$reunion->hora);
        $evento->setEnd($reunion->fecha,$reunion->hora,$request->duration);
        $reunion->direccion_id = $request->direccion_id;
        $reunion->n_personas = $request->n_personas;
        $reunion->p_entrada = $request->p_entrada;
        $reunion->t_entradas = $request->t_entradas;
        $reunion->estado = $request->estado;
        $reunion->prepago = $request->boolean('prepago');
        $reunion->chicas = $request->boolean('chicas');
        $evento->save();
        $reunion->save();
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
