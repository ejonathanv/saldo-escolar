<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimiento>
 */
class MovimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hijo_id' => 1,
            'producto_id' => 1,
            'costo' => fake()->randomFloat(2, 5, 50),
        ];
    }
}
