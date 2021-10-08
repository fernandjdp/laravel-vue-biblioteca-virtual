<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Linea;

class LineasInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Derecho
        Linea::create(array( 'id' => 0, 'nombre' => 'Derecho privado', 'carrera_id' => 0 ));
        Linea::create(array( 'id' => 1, 'nombre' => 'Formación ciudadana', 'carrera_id' => 0 ));
        Linea::create(array( 'id' => 2, 'nombre' => 'Sistema penal y administración de justicia', 'carrera_id' => 0 ));
        Linea::create(array( 'id' => 3, 'nombre' => 'Derechos humanos', 'carrera_id' => 0 ));
        Linea::create(array( 'id' => 4, 'nombre' => 'Derecho social', 'carrera_id' => 0 ));

        //Ingenieria Ambiental
        Linea::create(array( 'id' => 5, 'nombre' => 'Gestión del ambiente', 'carrera_id' => 1 ));
        Linea::create(array( 'id' => 6, 'nombre' => 'Desarrollo sustentable', 'carrera_id' => 1 ));
        Linea::create(array( 'id' => 7, 'nombre' => 'Evaluación ambiental', 'carrera_id' => 1 ));
        Linea::create(array( 'id' => 8, 'nombre' => 'Calidad ambiental', 'carrera_id' => 1 ));
        Linea::create(array( 'id' => 9, 'nombre' => 'Fuentes renovables de energía', 'carrera_id' => 1 ));

        //Ingeniería electrónica
        Linea::create(array( 'id' => 10, 'nombre' => 'Desarrollo tecnológico con fuentes renovables de energía', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 11, 'nombre' => 'Desarrollo tecnológico para la biomedicina', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 12, 'nombre' => 'Automatización industrial con énfasis en el entorno local', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 13, 'nombre' => 'Desarrollo de tecnologias de bajo costo para uso residencial', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 14, 'nombre' => 'Desarrollo de sistemas con manejo de potencia', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 15, 'nombre' => 'Desarrollo de sistemas mecanizados y robótica', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 16, 'nombre' => 'Tecnología para uso educativo', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 17, 'nombre' => 'Sistemas inteligentes', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 18, 'nombre' => 'Tecnologías de información y comunicación', 'carrera_id' => 2 ));
        Linea::create(array( 'id' => 19, 'nombre' => 'Desarrollo de sistemas de hardware y software', 'carrera_id' => 2 ));

        //Procesos gerenciales
        Linea::create(array( 'id' => 20, 'nombre' => 'Calidad y productividad', 'carrera_id' => 3 ));
        Linea::create(array( 'id' => 21, 'nombre' => 'Gerencia y transformación organizacional', 'carrera_id' => 3 ));
        Linea::create(array( 'id' => 22, 'nombre' => 'Gestión pública', 'carrera_id' => 3 ));
        Linea::create(array( 'id' => 23, 'nombre' => 'Desarrollo organizacional, comunicacional y liderazgo', 'carrera_id' => 3 ));
        Linea::create(array( 'id' => 24, 'nombre' => 'Mercadeo y competitividad', 'carrera_id' => 3 ));
        Linea::create(array( 'id' => 25, 'nombre' => 'Estudios económicos y financieros', 'carrera_id' => 3 ));
        Linea::create(array( 'id' => 26, 'nombre' => 'Gestión de talento humano', 'carrera_id' => 3 ));

    }
}
