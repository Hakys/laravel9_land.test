<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $viewData = [];
        $viewData["title"] = "Contactos - DR Admin";
        $viewData["subtitle"] = "Lista de Contactos";
        $viewData["contactos"] = Contacto::all();
        return view('contacto.index')->with("viewData", $viewData);
    }

    public function datalist($id=null){
        $response = ['clientes' => Contacto::getDatalist()];
        if($id){
            $c = Contacto::find($id);
            $response['direccions'] = $c->direccions;
        }
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show($telefono)
    {
        $c = Contacto::where('telefono',$telefono)->first();
        $viewData = [];
        $viewData["contacto"] = $c;
        $viewData["title"] = $c->getApodo()." - Online Store";
        $viewData["subtitle"] = "Información del Contacto ".$c->getApodo();
        return view('contacto.show')->with("viewData", $viewData);
    }
/*
    public function direccions($id){
        $contacto = Contacto::find($id)->first();
        $response = [
            'id' => $contacto->id,
            'direccions' => $contacto->direccions,
        ];
        return response()->json($response);
    }
*/
    public function direccions($full_apodo){
        $contacto = Contacto::where('apodo',explode("(",$full_apodo))->first();
        $response = [
            'id' => $contacto->id,
            'apodo' => $contacto->apodo,
            'telefono' => $contacto->telefono,
            'direccions' => $contacto->direccions,
        ];
        return response()->json($response);
    }

    public function store(Request $request){ 
        Log::info($request->all());
        request()->validate(Contacto::$rules);
        $c = new Contacto();
        $c->setApodo($request->apodo);
        $c->setTelefono($request->telefono);
        $c->save();
        return response()->json(['contacto_id'=>$c->getId()]);
    } 

    public function update(Request $request, $id){ 
        Log::info($request->all());
        $c = Contacto::where('id',$id)->first();
        $c->validator($request->all());
        $c->update([
            'apodo' => $request->apodo,
            'telefono' => $request->telefono,
        ]);
        return response()->json(['contacto_id'=>$c->getId()]);
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function delete($telefono)
    {
        $contacto = Contacto::where('telefono',$telefono)->first();
        Contacto::destroy($contacto->getId());
        return redirect()->route('contacto.index')->with('success', 'Contacto Borrado.');
    }
}
