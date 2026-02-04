<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = [
            'Galletas', 'Jugo', 'Agua', 'Sandwich', 'Manzana', 'Yogurt',
            'Leche', 'Cereal', 'Pan', 'Queso', 'Refresco', 'Papas',
            'Chocolate', 'Barra de granola', 'Naranja', 'Plátano', 'Uvas', 'Zanahoria',
        ];
        foreach ($nombres as $nombre) {
            Producto::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
