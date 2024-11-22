<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Repositories\Utilities\UIAvatar;

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
        $avatar = new UIAvatar();
        $apodo = str_pad($this->faker->numberBetween(0, 30), 2, '0', STR_PAD_LEFT)." ".$this->faker->name." ".$this->faker->city;
        $avatar->gen_avatar_random($apodo);
        return [
            "apodo" => $apodo,
            "telefono" => $this->faker->phoneNumber(),
            "avatar" =>  $avatar->img_avatar_name($apodo),
            'created_at' => today(),
            'updated_at' => today(),
        ];
    }
}
