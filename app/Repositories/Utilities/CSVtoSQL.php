<?php

namespace App\Repositories\Utilities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Contacto;

class CSVtoSQL {
    public function __construct(){

    }

    public function importCSV(){

        $csvFile = storage_path("app/public/imports/paso2.csv");

        if (($handle = fopen($csvFile, 'r')) !== FALSE) {
            $n=0;
            $first = true;

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if ($first) {
                    $first = false;
                    continue; // Saltar la primera fila si contiene encabezados
                }else $n++;

                 // Convertir cada campo a UTF-8
                $data = array_map(function($field) {
                    return mb_convert_encoding($field, 'UTF-8', 'Windows-1252');
                }, $data);

                $row = explode(";",$data[0]);
                //Log::info((string) $row[1]);

                try{
                    $contacto = new Contacto();
                    $contacto->setApodo($row[0]);
                    $contacto->setTelefono((string) $row[1]);
                    //$contacto->setAvatar();
                    $contacto->save();
                }catch(\Exception $e){
                    Log::info("CSVtoSQL: ERROR ".$e->getMessage());
                    $n--;
                }

                //
            }

            fclose($handle);

            Log::info("Se han importado $n contactos");
        } else {
            Log::info("No se pudo abrir el archivo CSV.");
        }

    }
}
