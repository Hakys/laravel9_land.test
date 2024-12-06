<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Reunion;
use App\Models\Pago;
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
            $evento = new Evento(['title' => $reunion->direccion->poblacion]);
            //$evento->setDuration(29);
            $evento->setStart($reunion->fecha,$reunion->hora);
            $evento->setEnd($reunion->fecha,$reunion->hora,"02:00");
            $reunion->evento()->save($evento);
            Pago::create([
                'concepto' => 'reserva',
                'fecha'=>$reunion->getFecha(),
                'metodo' => 'bizum',
                'contacto_id' => $reunion->direccion->contacto->id,
                'reunion_id' => $reunion->getId(),
                'importe' => $reunion->t_entradas,
            ]);
            Pago::Factory(random_int(1,5))->create(['reunion_id'=>$reunion->getId()]);
        }

    }
}
