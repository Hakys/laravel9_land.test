<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contacto;
use App\Models\Direccion;
use App\Repositories\Utilities\UIAvatar;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $avatar = new UIAvatar();

        $contactos = [
            ["apodo" => "00 Antonio Vigo", "telefono" => "653178954", "avatar" => $avatar->img_avatar_name("00 Antonio Vigo")],
            ["apodo" => "00 Julia Ch", "telefono" => "695811711", "avatar" => $avatar->img_avatar_name("00 Julia Ch")],
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
