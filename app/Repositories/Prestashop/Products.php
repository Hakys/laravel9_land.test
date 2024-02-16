<?php

namespace App\Repositories\Prestashop;

use GuzzleHttp\Client;

class Products 
{
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function all(){
        $response = $this->client->request('GET', 'api/products');
        $preitems = json_decode($response->getBody()->getContents());
        return $preitems->products;
    }

    public function find($id){
        $response = $this->client->request('GET', 'api/products/'.$id);
        $preitem = json_decode($response->getBody()->getContents());
        return $preitem->product;
    }
}