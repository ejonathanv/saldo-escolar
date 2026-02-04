<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hijo>
 */
class HijoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grados = ['1°', '2°', '3°', '4°', '5°', '6°'];
        $grupos = ['A', 'B', 'C'];
        return [
            'tutor_id' => 1,
            'foto' => 'avatars/placeholder.png',
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'grado' => fake()->randomElement($grados),
            'grupo' => fake()->randomElement($grupos),
        ];
    }
}
