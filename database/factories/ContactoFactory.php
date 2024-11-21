<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "apodo" => str_pad($this->faker->numberBetween(0, 30), 2, '0', STR_PAD_LEFT)." ".$this->faker->name." ".$this->faker->city,
            "telefono" => $this->faker->phoneNumber(),
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }
}
