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
            "apodo" => $this->faker->name." ".$this->faker->city." ".$this->faker->state,
            "telefono" => $this->faker->phoneNumber(),
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }
}
