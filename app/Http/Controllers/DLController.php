<?php

namespace App\Http\Controllers;

use App\Repositories\Xml\Dreamlove;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Product;

class DLController extends Controller
{
    protected $products;

    public function __construct(Dreamlove $dreamlove) {
        $this->products = $dreamlove;
    }

    public function index(){
        $datetime = new DateTime();
        $hoyunix = $datetime->format("U");
        $hoy = gmdate("d-m-Y H:i:s", $hoyunix);
        $lastUpload = $this->products->status();
        $productos = Product::all();
        return view('import.dreamlove.index',compact('hoy','lastUpload','productos'));
    }
    
    public function importfile(){    
        if($this->products->importFile())
            $result = ['success', 'Archivo Importado.'];
        else
            $result = ['error', 'Error al Importar el Fichero.'];
        return redirect()->route('import.dreamlove.index')->with($result[0],$result[1]);
    }

    public function loadFile($limit){
        $result = $this->products->all($limit);
        return redirect()->route('import.dreamlove.index')->with('success',"Archivo Cargado. U: ".$result[0]." C: ".$result[1]);
    }
    
    public function show($referencia){
        $producto = $this->products->find($referencia);
        if($producto)
            return view('import.dreamlove.show',compact('producto'));
        else
            return redirect()->route('import.dreamlove.index')->with('error',"Producto $referencia NO Encontrado.");
    }
}
