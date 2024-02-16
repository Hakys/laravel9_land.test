<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Direccion;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Direccion>
 */
class DireccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Direccion::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "full_name" => $this->faker->name()." ".$this->faker->lastName()." ".$this->faker->lastName(),
            "direccion" => $this->faker->streetAddress,
            "telefono" => $this->faker->phoneNumber(),
            "cp" => $this->faker->postcode,
            "poblacion" => $this->faker->city,
            "provincia" => $this->faker->state,
            "pais" => "España",
            "nif" => $this->faker->ean8.Str::upper($this->faker->randomLetter),
            "email" => $this->faker->email,
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }

    public function sindatos(){
        return $this->state(function (array $attributes) {
            return [
                "full_name" => "Recoge",
                "direccion" => "F. Simplificada, Sin Datos",
                "cp" => "",
                "poblacion" => "Huelva",
                "provincia" => "",
                "nif" => "",
                "email" => "",
                'created_at' => today(),
                'updated_at' => today(),
            ];
        });
    }
}
