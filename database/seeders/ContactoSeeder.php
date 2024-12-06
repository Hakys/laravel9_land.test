<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contacto;
use App\Models\Direccion;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $contactos = [
            ["apodo" => "00 Antonio Vigo", "telefono" => "653178954"],
            ["apodo" => "00 Julia Ch", "telefono" => "695811711"],
        ];

        foreach($contactos as $contacto){
            $c = Contacto::Create($contacto);
            $direccion = [
                'full_name' => 'Antonio Vigo',
                'telefono' => '653178954',                
                'direccion' => 'Avenida Cristobal Colon, 103',                
                'poblacion' => 'Huelva', 
                'provincia' => 'Huelva',
                'cp' => '21002',               
                'pais' => 'España',
                'contacto_id' => $c->getId()
            ];
            Direccion::create($direccion);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
        }
       
        $contactos = Contacto::factory(100)->create();
        foreach($contactos as $c){
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
        }
    }
}
