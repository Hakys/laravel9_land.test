<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

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
