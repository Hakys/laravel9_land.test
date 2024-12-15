<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Reunion;
use App\Models\Pago;


class ReunionController extends Controller
{
    public function index(){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Calendario Tuppersex";
        $viewData["ant"] = "";
        $viewData["hoy"] = Reunion::formatFecha(time());
        $viewData["reunions"] = Reunion::orderBy('fecha', 'DESC')->get();
        return view("reunion.index")->with("viewData", $viewData);
    }

    public function gestion(){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Gestión Reuniones Tuppersex";
        return view("reunion.gestion")->with("viewData", $viewData);
    }

    public function show($id){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Detalles Reuniones Tuppersex";
        $viewData["reunion"] = Reunion::findOrFail($id);
        return view("reunion.show", compact("viewData", 'id'));
    }

    public function create(Request $request){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Crear Reuniones Tuppersex";
        $viewData["date"] = $request->date." 00:00";
        return view("reunion.create")->with("viewData", $viewData);
    }

    public function edit($id){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Editar Info. Reuniones Tuppersex";
        $reunion = Reunion::find($id)->first();
        $viewData["reunion"] = $reunion;
        $viewData["direccion_id"] = $reunion->direccion->getId();
        return view("reunion.edit")->with("viewData", $viewData);
    }

    public function estados(){
        $response = ['estados' => Reunion::getEstados()];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //Log::info($request->all());
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
        Pago::create([
            'concepto' => 'reserva',
            'fecha'=>$reunion->getFecha(),
            'metodo' => ($request->boolean('prepago')?'bizum':'efectivo'),
            'contacto_id' => $reunion->direccion->contacto->id,
            'reunion_id' => $reunion->getId(),
            'importe' => $reunion->t_entradas,
        ]);
        return response()->json(['reunion_id'=>$reunion->getId()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        //Log::info($request->all());
        $r = Reunion::where('id',$id)->first();
        request()->validate(Reunion::$rules);
        $r->update([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'direccion_id' => $request->direccion_id,
            'n_personas' => $request->integer('n_personas'),
            'p_entrada' => $request->integer('p_entrada'),
            't_entradas' => $request->integer('t_entradas'),
            'estado' => $request->estado,
            'prepago' => $request->boolean('prepago'),
            'chicas' => $request->boolean('chicas'),
        ]);
        return response()->json(['reunion_id'=>$r->getId()]);
    }

    public function delete($id)
    {
        $reunion = Reunion::find($id)->first();
        Reunion::destroy($reunion->getId());
        return redirect()->route('reunion.index')->with('success', 'Reunion Borrada.');
    }
}
