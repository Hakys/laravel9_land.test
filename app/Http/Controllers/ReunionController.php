<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    public function index(){
        $viewData["title"] = "Reuniones Tuppersex - Online Store";
        $viewData["subtitle"] = "";
        $viewData["ant"] = "";
        $viewData["reunions"] = Reunion::orderBy('fecha', 'DESC')->get();
        return view("reunion.index")->with("viewData", $viewData);
    }
}
