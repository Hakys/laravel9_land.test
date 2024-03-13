<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Product;

class ImportController extends Controller
{
    public function index(){
        $datetime = new DateTime();
        $hoyunix = $datetime->format("U");
        $hoy = gmdate("d-m-Y H:i:s", $hoyunix);
        $productos = Product::all();
        return view('import.index',compact('hoy','productos'));
    }
}