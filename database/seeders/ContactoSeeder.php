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
            ["apodo" => "00 Antonio", "telefono" => "653178954"],
            ["apodo" => "00 Julia", "telefono" => "695811711"],
        ];
        foreach($contactos as $contacto){
            $c = Contacto::Create($contacto);
            $d = Direccion::factory()->create(["contacto_id" => $c->getId()]);
            $d = Direccion::factory()->create(["contacto_id" => $c->getId()]);
            $d = Direccion::factory()->create(["contacto_id" => $c->getId()]);
        }

        $contactos = Contacto::factory(100)->create();
        foreach($contactos as $c){
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
            Direccion::factory()->create(["contacto_id" => $c->getId()]);
        }
    }
}
