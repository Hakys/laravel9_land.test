<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;
use App\Repositories\Distance\Distancematrix;
use Illuminate\Support\Carbon;

class ReunionController extends Controller
{
    public function index(){
        $viewData["title"] = "Reuniones Tuppersex";
        $viewData["subtitle"] = "Agenda Tuppersex";
        $viewData["ant"] = "";        
        $viewData["hoy"] = Reunion::formatFecha(time());
        $viewData["reunions"] = Reunion::orderBy('fecha', 'DESC')->get();
        return view("reunion.index")->with("viewData", $viewData);
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

    public function gestion(){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Gestión Reuniones Tuppersex";
        return view("reunion.gestion")->with("viewData", $viewData);
    }

    public function estados(){
        $response = ['estados' => Reunion::getEstados()];
        return response()->json($response);
    }
}
