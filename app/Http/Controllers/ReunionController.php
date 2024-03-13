<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;
use App\Repositories\Distance\Distancematrix;

class ReunionController extends Controller
{
    public function index(){
        $matrix = new Distancematrix();
        $origins = "37.270974062858784,-6.9505493644180705";
        $origins="avenida de cristobal colon, 103, huelva, españa";
        $destinations = "37.377497011094654,-5.98694274301218";
        
        //$r=$matrix->distance($origins,$destinations);
        //dd($r); 
        $viewData["title"] = "Reuniones Tuppersex";
        $viewData["subtitle"] = "Agenda Tuppersex";
        $viewData["ant"] = "";        
        $viewData["hoy"] = Reunion::formatFecha(time());
        $viewData["reunions"] = Reunion::orderBy('fecha', 'DESC')->get();
        return view("reunion.index")->with("viewData", $viewData);
    }

    public function create(){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Crear Reuniones Tuppersex";
        return view("reunion.create")->with("viewData", $viewData);
    }

    public function gestion(){
        $viewData["title"] = "Reuniones";
        $viewData["subtitle"] = "Gestión Reuniones Tuppersex";
        return view("reunion.gestion")->with("viewData", $viewData);
    }
}
