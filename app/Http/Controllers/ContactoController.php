<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function datalist(){
        $contactos= DB::table('contactos as c')
            ->selectRaw('c.id')
            ->selectRaw('CONCAT(c.apodo," (",c.telefono,")") AS full_apodo')
            ->get(); 
        return response()->json($contactos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show($telefono)
    {
        $viewData = [];
        $viewData["contacto"] = Contacto::where('telefono',$telefono)->first();
        $viewData["title"] = $viewData["contacto"]->getApodo()." - Online Store";
        $viewData["subtitle"] = "Información del Contacto ".$viewData["contacto"]->getApodo();
        return view('contacto.show')->with("viewData", $viewData);
    }

    public function direccions($full_apodo){
        $contacto = Contacto::where('apodo',explode("(",$full_apodo))->first();
        return response()->json($contacto->direccions);
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
