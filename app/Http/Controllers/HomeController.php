<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] = "About us";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by Hakys";
        return view('home.about')->with("viewData", $viewData);
    }
    public function links()
    {
        $viewData = [];
        $viewData["title"] = "Enlces Interes - Online Store";
        $viewData["subtitle"] = "Enlcaes de Interes";
        $viewData["description"] = "";
        $viewData["author"] = "Developed by Hakys";
        return view('home.links')->with("viewData", $viewData);
    }
}
