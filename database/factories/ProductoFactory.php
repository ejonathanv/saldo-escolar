<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    private static $nombres = [
        'Galletas', 'Jugo', 'Agua', 'Sandwich', 'Manzana', 'Yogurt',
        'Leche', 'Cereal', 'Pan', 'Queso', 'Refresco', 'Papas',
        'Chocolate', 'Barra de granola', 'Naranja', 'Plátano', 'Uvas', 'Zanahoria',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->randomElement(self::$nombres),
            'costo' => rand(20, 100),
            'stock' => rand(10, 100)
        ];
    }
}
