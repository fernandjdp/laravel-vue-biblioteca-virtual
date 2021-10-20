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
        Carrera::truncate();

        $carreras = [
            [
                'nombre' => 'Derecho',
                'icono' => 'landmark'
            ],
            [
                'nombre' => 'Ingeniería Ambiental', 
                'icono' => 'tree' 
            ],
            [
                'nombre' => 'Ingeniería Electrónica', 
                'icono' => 'server' 
            ],
            [
                'nombre' => 'Procesos Gerenciales', 
                'icono' => 'dollar-sign'     
            ],
            [
                'nombre' => 'Turismo', 
                'icono' => 'store' 
            ]
        ];

        Carrera::insert($carreras);
    }
}
