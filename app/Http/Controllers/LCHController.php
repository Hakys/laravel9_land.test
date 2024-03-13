<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Xml\Lovecherry;
use Illuminate\Http\Request;
use DateTime;

class LCHController extends Controller
{
    protected $products;

    public function __construct(Lovecherry $lovecherry) {
        $this->products = $lovecherry;
    }

    public function index(){
        $datetime = new DateTime();
        $hoyunix = $datetime->format("U");
        $hoy = gmdate("d-m-Y H:i:s", $hoyunix);
        $lastUpload = $this->products->status();
        $productos = Product::all();
        return view('import.lovecherry.index',compact('hoy','lastUpload','productos'));
    }

    public function importfile(){    
        if($this->products->importFile())
            $result = ['success', 'Archivo Importado.'];
        else
            $result = ['error', 'Error al Importar el Fichero.'];
        return redirect()->route('lovecherry.index')->with($result[0],$result[1]);
    }

    public function loadFile($limit){
        $result = $this->products->all($limit);
        return redirect()->route('lovecherry.index')->with('success',"Archivo Cargado. U: ".$result[0]." C: ".$result[1]);
    }
}
