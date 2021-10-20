<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;

class UdefaCarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create(array( 'id' => 0, 'nombre' => 'Derecho', 'icono' => 'landmark' ));
        Carrera::create(array( 'id' => 1, 'nombre' => 'Ingeniería Ambiental', 'icono' => 'tree' ));
        Carrera::create(array( 'id' => 2, 'nombre' => 'Ingeniería Electrónica', 'icono' => 'server' ));
        Carrera::create(array( 'id' => 3, 'nombre' => 'Procesos Gerenciales', 'icono' => 'dollar-sign' ));
        Carrera::create(array( 'id' => 4, 'nombre' => 'Turismo', 'icono' => 'store' ));
    }
}
