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
        $viewData["subtitle"] = "Lista de contactos";
        $viewData["contactos"] = Contacto::all();
        return view('contacto.index')->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $viewData = [];
        $viewData["title"] = "Crear Contacto - Online Store";
        $viewData["subtitle"] = "Crear Contacto";
        return view('contacto.create')->with("viewData", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function store(Request $request){
        Contacto::validate($request);
        Contacto::create(['apodo' => $request->input('apodo'), 'telefono' => $request->input('telefono')]);
        return redirect()->route('contacto.index')->with('success', 'Contacto Creado.');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($telefono)
    {
        $viewData = [];
        $viewData["contacto"] = Contacto::where('telefono',$telefono)->first();
        $viewData["title"] = "Editar Contacto - Online Store";
        $viewData["subtitle"] = "Editar Contacto ".$viewData["contacto"]->getApodo();
        return view('contacto.edit')->with("viewData", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $telefono)
    {
        $contacto = Contacto::where('telefono',$telefono)->first();
        $request->validate([
                'apodo' => 'required|unique:contactos,apodo,'.$contacto->getId(),
                'telefono' => 'required|unique:contactos,telefono,'.$contacto->getId(),
            ]
        );
        $contacto->SetApodo($request->input('apodo'));
        $contacto->SetTelefono($request->input('telefono'));
        $contacto->save();
        return redirect()->route('contacto.show',$contacto->getTelefono())->with('success', 'Contacto Actualizado.');
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
