<?php

namespace Database\Seeders;

use App\Models\CategoriaRestriccion;
use Illuminate\Database\Seeder;

class CategoriaRestriccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = ['Refrescos', 'Frituras', 'Dulces', 'Alimentos Saludables'];
        foreach ($categorias as $nombre) {
            CategoriaRestriccion::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
