<?php

namespace App\Http\Controllers;

use App\Repositories\Xml\Dreamlove;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Product;

class XmlController extends Controller
{
    protected $products;

    public function __construct(Dreamlove $dreamlove) {
        $this->products = $dreamlove;
    }

    public function importfile(){    
        if($this->products->importFile())
            $result = ['success', 'Archivo Importado.'];
        else
            $result = ['error', 'Error al Importar el Fichero.'];
        return redirect()->route('xml.index')->with($result[0],$result[1]);
    }

    public function loadFile($limit){
        $result = $this->products->all($limit);
        return redirect()->route('xml.index')->with('success',"Archivo Cargado. U: ".$result[0]." C: ".$result[1]);
    }
    
    public function index(){
        $datetime = new DateTime();
        $hoyunix = $datetime->format("U");
        $hoy = gmdate("d-m-Y H:i:s", $hoyunix);
        $lastUpload = $this->products->status();
        $productos = Product::all();
        return view('xml.index',compact('hoy','lastUpload','productos'));
    }

    public function show($referencia){
        $producto = $this->products->find($referencia);
        if($producto)
            return view('xml.show',compact('producto'));
        else
            return redirect()->route('xml.index')->with('error',"Producto $referencia NO Encontrado.");
    }

    
}
