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
        $array = explode(' ',$nombre);
        $nombre_slug = $array[1]." ".$array[2];
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
                $rutaCompleta = public_path("/img/avatar/".Str::slug($nombre).'.png');

                // Crear la carpeta sino existe
                if (!is_dir(dirname($rutaCompleta))) {
                    mkdir(dirname($rutaCompleta), 0755, true);
                }

                // Guardar la imagen
                if(file_put_contents($rutaCompleta, $imageData))
                    Log::info("Avatar creado con exito: ".$rutaCompleta);

                /*
                // Guardar la imagen sino existe
                if(!is_file($rutaCompleta)){

                }else{
                    Log::info("La imagen de Avatar ya existe: " . $rutaCompleta);
                }
                */
            }else{
                // Manejar errores
                Log::info("Error al generar el avatar: " . $response->getStatusCode());
            }
        }catch (\Exception $e) {
            // Manejar excepciones
            Log::info("Avatar Error: " . $e->getMessage());
        }
    }

    public static function img_avatar_name($nombre){
        $namefile = Str::slug($nombre).'.png';
        if(is_file(public_path("/img/avatar/".$namefile)))
            return $namefile;
        else
            return "no-avatar.png";
    }

    public static function img_avatar_route($nombre){
        return '/img/avatar/'.UIAvatar::img_avatar_name($nombre);
    }
}
