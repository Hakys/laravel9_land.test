<?php

namespace App\Repositories\Distance;

use GuzzleHttp\Client;
use App\Models\Direccion;
use Illuminate\Support\Facades\Log;

class PostalCodeSearch{
    protected $client;
    protected $apiKey;

    public function __construct($apiKey = "AntonioV")
    {
        //http://api.geonames.org/postalCodeSearchJSON?formatted=true&postalcode=9011&maxRows=10&username=demo&style=full
        $this->client = new Client();
        $this->apiKey = $apiKey;
    }

    public function obtenerCodigoPostal($codigoPostal)
    {
        try {
            $response = $this->client->request('GET', "http://api.geonames.org/postalCodeSearchJSON", [
                'query' => [
                    'postalcode' => $codigoPostal,
                    'country' => 'ES',
                    'username' => $this->apiKey,
                ]
            ]);

            // Obtener el cuerpo de la respuesta
            $body = $response->getBody();
            $contents = $body->getContents();

            // Decodificar el contenido JSON
            $data = json_decode($contents, true);

            // Procesar los datos
            if (json_last_error() === JSON_ERROR_NONE) {
                // Los datos se decodificaron correctamente
                return $data;
            } else {
                // Hubo un error al decodificar el JSON
                throw new Exception("Error al decodificar JSON: " . json_last_error_msg());
            }

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Manejar errores de solicitud
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody();
                throw new Exception("Error de solicitud: Código de estado $statusCode\nCuerpo de la respuesta: $body\n");
            } else {
                throw new Exception("Error de solicitud: " . $e->getMessage());
            }
        }
    }
}