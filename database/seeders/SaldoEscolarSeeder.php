<?php

namespace Database\Seeders;

use App\Models\CategoriaRestriccion;
use App\Models\Deposito;
use App\Models\Hijo;
use App\Models\Movimiento;
use App\Models\Producto;
use App\Models\Restriccion;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Seeder;

class SaldoEscolarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productoIds = Producto::pluck('id')->toArray();
        $categoriaIds = CategoriaRestriccion::pluck('id')->toArray();

        $users = User::factory(10)->create();
        $tutors = $users->map(fn (User $user) => Tutor::create(['user_id' => $user->id]));

        foreach ($tutors as $tutor) {
            $numHijos = random_int(0, 3);
            for ($i = 0; $i < $numHijos; $i++) {
                $hijo = Hijo::factory()->create(['tutor_id' => $tutor->id]);

                $numDepositos = random_int(5, 10);
                Deposito::factory($numDepositos)->create([
                    'tutor_id' => $tutor->id,
                    'hijo_id' => $hijo->id,
                ]);

                $numMovimientos = random_int(10, 20);
                for ($m = 0; $m < $numMovimientos; $m++) {
                    Movimiento::factory()->create([
                        'hijo_id' => $hijo->id,
                        'producto_id' => $productoIds[array_rand($productoIds)],
                    ]);
                }

                $numRestricciones = min(random_int(1, 3), count($categoriaIds));
                shuffle($categoriaIds);
                $categoriasElegidas = array_slice($categoriaIds, 0, $numRestricciones);
                foreach ($categoriasElegidas as $categoriaId) {
                    Restriccion::factory()->create([
                        'hijo_id' => $hijo->id,
                        'categoria_restriccion_id' => $categoriaId,
                    ]);
                }
            }
        }
    }
}
