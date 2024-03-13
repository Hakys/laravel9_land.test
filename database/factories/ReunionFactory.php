<?php

namespace Database\Factories;

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
            'fecha' => $this->faker->dateTimeInInterval('-5 day', '+10 day'), 
            //dateTimeBetween
            //'fecha' => $this->faker->dateTimeThisMonth(),
            //'fecha' => $this->faker->date(),
            'poblacion' => $this->faker->city,
            'provincia' => $this->faker->state,
            'chicas' => $this->faker->boolean,
            'prepago' => $this->faker->boolean,
            'n_personas' => $n,
            'p_entrada' => (float)$p,
            't_entradas' => (float)$n*$p, 
            'direccion_id' => 1,
            'estado' => $this->faker->randomElement(Reunion::getEstados()),
            //'estado' => "SOLICITADA",
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }
}