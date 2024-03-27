<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Reunion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReunionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reunions = Reunion::factory(20)->create();
        foreach ($reunions as $reunion) {
            $evento = new Evento(['title' => $reunion->direccion->provincia]);
            //$evento->setDuration(29);
            $evento->setStart($reunion->fecha,$reunion->hora);
            $evento->setEnd($reunion->fecha,$reunion->hora);
            $reunion->evento()->save($evento);
        }
        
    }
}
