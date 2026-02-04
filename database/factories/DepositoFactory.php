<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deposito>
 */
class DepositoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tutor_id' => 1,
            'hijo_id' => 1,
            'cantidad' => fake()->randomFloat(2, 50, 500),
        ];
    }
}
