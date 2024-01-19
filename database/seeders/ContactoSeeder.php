<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contacto;

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
            ["apodo" => "Paco", "telefono" => "653178954"],
        ];
        foreach($contactos as $contacto)
            Contacto::Create($contacto);
    }
}
