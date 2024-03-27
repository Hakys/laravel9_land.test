<?php

namespace Database\Factories;

use App\Models\Direccion;
use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reunion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reunion>
 */
class ReunionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $n = $this->faker->numberBetween(6, 15);
        $p = $this->faker->numberBetween(5, 10);

        return [
            'fecha' => $this->faker->dateTimeInInterval('-5 day', '+10 day')->format('Y-m-d'), 
            'hora' => $this->faker->randomElement(['16:30','19:30','23:30']),
            'chicas' => $this->faker->boolean,
            'prepago' => $this->faker->boolean,
            'n_personas' => $n,
            'p_entrada' => (float)$p,
            't_entradas' => (float)$n*$p, 
            'direccion_id' => Direccion::inRandomOrder()->first()->id,
            'estado' => $this->faker->randomElement(Reunion::getEstados()),
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }
}
