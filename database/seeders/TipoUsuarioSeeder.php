<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::create(array( 'id' => 0, 'nombre' => 'visitante' ));
        TipoUsuario::create(array( 'id' => 1, 'nombre' => 'estudiante' ));
        TipoUsuario::create(array( 'id' => 2, 'nombre' => 'docente' ));
        TipoUsuario::create(array( 'id' => 3, 'nombre' => 'administrador' ));
        TipoUsuario::create(array( 'id' => 4, 'nombre' => 'creador' ));
    }
}
