<?php

namespace App\Repositories\Distance;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use App\Models\Direccion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class Distancematrix
{
    protected Client $client;
    //https://api.distancematrix.ai/maps/api/distancematrix/json?origins=37.270974062858784,-6.9505493644180705&destinations=37.377497011094654,-5.98694274301218&key=j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2

    //$r=$matrix->distance($origins0."|".$origins1,$destinations0);

    public $micasa;
    public $origin;
    public $destination;
    public $distance_text;
    public $distance_value;
    public $duration_text;
    public $duration_value;

    public function __construct() {
        //$origins0 = "37.270974062858784,-6.9505493644180705";
        $this->micasa = "avenida de cristobal colon, 103, huelva, españa";
        $this->client = new Client([
            'base_uri' => 'https://api.distancematrix.ai',
            'timeout'  => 20.0,
            'language' => 'es',
            'query' => [
                'key' => 'j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2',
            ],
        ]);
    }

    public function setDurationText($duration_value){
        $this->duration_text = $this->convertTimeFormat($duration_value);
    }

    public function setOrigin(Direccion $direccion) {
        $this->origin = $this->ConvertDireccion($direccion);
    }

    public function setDestination(Direccion $direccion){
        $this->destination = $this->ConvertDireccion($direccion);
    }

    public function ConvertDireccion(Direccion $direccion){
         /*return  
            $direccion->getPoblacion().", ".

            $direccion->getPais();
           */
        return  $direccion->getDireccion().", ".
            $direccion->getPoblacion().", ".
            $direccion->getProvincia().", ".
            $direccion->getPais();
            
    }

    public function distance($origin,$destination){
        $this->distance_text = "0 km";
        $this->distance_value = 0; 
        $this->duration_text = "00:00 h."; 
        $this->duration_value = 0; 
        $query= ['query'=>[
            'key' => 'j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2',
            'origins' => $origin,
            'destinations' => $destination,]
        ];

        try {
            $response = $this->client->request('GET', '/maps/api/distancematrix/json',$query);

            // Obtener el código de estado de la respuesta
            $statusCode = $response->getStatusCode();
            //echo "Código de estado: $statusCode\n";

            // Obtener el cuerpo de la respuesta
            $body = $response->getBody();
            $contents = $body->getContents();

            // Decodificar el contenido JSON (si es JSON)
            $data = json_decode($contents);

            // Procesar los datos
            if (json_last_error() === JSON_ERROR_NONE) {
                // Los datos se decodificaron correctamente
                if($data->rows[0]->elements[0]->status!="ZERO_RESULTS"){
                    $this->distance_text = $data->rows[0]->elements[0]->distance->text;
                    $this->distance_value = $data->rows[0]->elements[0]->distance->value;
                    $this->duration_text = $this->convertTimeFormat($data->rows[0]->elements[0]->duration->value);
                    $this->duration_value = $data->rows[0]->elements[0]->duration->value; 
                }else{
                    print_r($data);
                }
            } else {
                // Hubo un error al decodificar el JSON
                echo "Error al decodificar JSON: " . json_last_error_msg();
                $this->distance_text = "ERROR";
            }

        } catch (ConnectException $e) {
            // Manejar errores de solicitud
            echo "Error de solicitud: " . $e->getMessage();
            $this->distance_text = "ERROR";
        }
    }

    public function geometry($address){
        $query= ['query'=>[
            'key' => 'j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2',
            'address' => urlencode($address),
            ]
        ];
        $response = $this->client->request('GET', '/maps/api/geocode/json',$query);
        return json_decode($response->getBody()->getContents());
    }

    public function desdeCasa(Direccion $destination){
        $this->setDestination($destination);
        $this->distance($this->micasa,$this->destination);
       //dd($response->rows[0]->elements[0]->status);
        //if($response->rows[0]->elements[0]->status=='OK')
            //return  $response->rows[0]->elements[0];

        /*
        $matrix = new Distancematrix();

        $destinations0 = "37.377497011094654,-5.98694274301218";
        $destinations1 = "avenida de málaga, 25, ronda, málaga, españa";

        $r=$matrix->desdeCasa($destinations0);
        dd($r);

        {#1341 ▼ // app\Http\Controllers\ReunionController.php:19
        +"distance": {#1357 ▼
            +"text": "93.5 km"
            +"value": 93483
        }
        +"duration": {#1352 ▼
            +"text": "1 hour 3 mins"
            +"value": 3816
        }
        +"origin": "avenida de cristobal colon, 103, huelva, españa"
        +"destination": "37.377497011094654,-5.98694274301218"
        +"status": "OK"
        }
        */
    }

    public function convertTimeFormat($timeValue) {
         // Crear un objeto Carbon con los segundos
         $carbonTime = Carbon::createFromTimestamp($timeValue);

         // Formatear el tiempo en el formato deseado
         //Log::info($carbonTime->format('H:i') . 'h');
         return $carbonTime->format('H:i') . 'h';
    }
}
