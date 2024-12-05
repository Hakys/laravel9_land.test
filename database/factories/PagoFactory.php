<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pago;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $conceptos = Pago::getConceptos();
        $metodos = Pago::getMetodos();
        return [
            'concepto' => $conceptos[$this->faker->numberBetween(0, count($conceptos)-1)],
            'importe' => $this->faker->numberBetween(10, 200)
                        + $this->faker->randomFloat(2,0,100),
            'fecha' => today(),
            'metodo' => $metodos[$this->faker->numberBetween(0, count($metodos)-1)],
            'contacto_id' => Contacto::factory(),
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }
}
