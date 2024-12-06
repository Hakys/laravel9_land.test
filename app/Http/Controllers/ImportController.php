<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Product;
use App\Repositories\Utilities\CSVtoSQL;
use App\Models\Contacto;
use App\Models\Direccion;
use App\Models\Reunion;
use App\Models\Pago;
use App\Models\Ruta;

class ImportController extends Controller
{
    public function index(){
        $datetime = new DateTime();
        $hoyunix = $datetime->format("U");
        $hoy = gmdate("d-m-Y H:i:s", $hoyunix);
        $contactos = Contacto::all();
        $direccions = Direccion::all();
        $productos = Product::all();
        $reunions = Reunion::all();
        $pagos = Pago::all();
        $rutas = Ruta::all();  
        return view('import.index',
            compact('hoy','productos', 'contactos', 'direccions','reunions','pagos','rutas'));
    }

    public function importContacto(){
        $import = new CSVtoSQL();
        $import->importCSV();
        return redirect()->route('import.index')->with('success','Contactos Importados');
    }
}
