<?php

namespace App\Repositories\Utilities;

use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class UIAvatar
{
    protected Client $client;

    public function __construct(){
        //https://ui-avatars.com/api/?name=00+Antonio&background=random&color=random&size=512
        // Crear un cliente GuzzleHttp
        $this->client = new Client([
            'base_uri' => 'https://ui-avatars.com',
            'timeout'  => 2.0,
        ]);
    }

    public function gen_avatar_random($nombre){
        //$nombre2 = implode(" ",array_slice(explode(' ',$nombre),1));
        $array = array_slice(explode(' ',$nombre),1);
        $nombre_slug = $array[0]." ".$array[1];
        //Log::info($nombre3[0]." ".$nombre3[1]);
        $query= ['query' => [
                'name' => $nombre_slug,
                'color' => 'b02a37',
                'backgorund' => 'b02a37',
                'size' => 128
            ]
        ];
        try{
            // Realizar la petición GET a la API
            $response = $this->client->request('GET', '/api',$query);
            // Verificar si la respuesta es exitosa (código 200)
            if ($response->getStatusCode() === 200) {
                // Obtener el contenido de la imagen
                $imageData = $response->getBody()->getContents();

                // Crear la ruta completa del archivo
                $rutaCompleta = public_path($this->img_avatar_route($nombre));

                // Crear la carpeta sino existe
                if (!is_dir(dirname($rutaCompleta))) {
                    mkdir(dirname($rutaCompleta), 0755, true);
                }

                // Guardar la imagen sino existe
                if(!is_file($rutaCompleta)){
                    file_put_contents($rutaCompleta, $imageData);
                }else{
                    Log::info("La imagen de Avatar ya existe: " . $rutaCompleta);
                }
            }else{
                // Manejar errores
                Log::info("Error al generar el avatar: " . $response->getStatusCode());
            }
        }catch (\Exception $e) {
            // Manejar excepciones
            Log::info("Error: " . $e->getMessage());
        }
    }

    public static function img_avatar_name($nombre){
        return Str::slug($nombre).'.png';
    }

    public static function img_avatar_route($nombre){
        $rutaCompleta = '/img/avatar/'.UIAvatar::img_avatar_name($nombre);
        if(!is_file(public_path($rutaCompleta)))
            $rutaCompleta = "/img/avatar/no-avatar.png";
        return $rutaCompleta;
    }
}
