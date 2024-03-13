<?php

namespace App\Repositories\Distance;

use GuzzleHttp\Client;

class Distancematrix 
{
    protected Client $client;
    //https://api.distancematrix.ai/maps/api/distancematrix/json?origins=37.270974062858784,-6.9505493644180705&destinations=37.377497011094654,-5.98694274301218&key=j085NeT5pvSDqCKsT6KXzTuPC2ySGi9Kau6gIP6szAf7eMg0jdblEUghNNRMvlc2
    
    public function __construct() { 
        $this->client = new Client([
            'base_uri' => 'https://api.distancematrix.ai',
            'timeout'  => 2.0,
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
}