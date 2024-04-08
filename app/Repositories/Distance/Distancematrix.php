<?php

namespace App\Repositories\Distance;

use GuzzleHttp\Client;

class Distancematrix 
{
    protected Client $client;
    //https://api.distancematrix.ai/maps/api/distancematrix/json?origins=37.270974062858784,-6.9505493644180705&destinations=37.377497011094654,-5.98694274301218&key=j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2
    
    //$r=$matrix->distance($origins0."|".$origins1,$destinations0);

    protected $micasa;

    public function __construct() { 
        //$origins0 = "37.270974062858784,-6.9505493644180705";
        $this->micasa = "avenida de cristobal colon, 103, huelva, españa";
        $this->client = new Client([
            'base_uri' => 'https://api.distancematrix.ai',
            'timeout'  => 2.0,
            'language' => 'es',
            'query' => [
                'key' => 'j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2', 
            ],
        ]);
    }

    public function distance($origins,$destinations){
        $query= ['query'=>[
            'key' => 'j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2', 
            'origins' => $origins,
            'destinations' => $destinations,]
        ];
        $response = $this->client->request('GET', '/maps/api/distancematrix/json',$query);
        return json_decode($response->getBody()->getContents());
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

    public function desdeCasa($destino){
        $response = $this->distance($this->micasa,$destino);
        return $response->rows[0]->elements[0];
        
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
}