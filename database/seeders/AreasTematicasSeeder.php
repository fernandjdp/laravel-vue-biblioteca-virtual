<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\areaTematica;

class AreasTematicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        areaTematica::truncate();

        $areas_tematicas = [
            [
            'nombre' => 'Derecho de autor y nuevas tecnologías', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Régimen legal del derecho privado', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Derecho de obligaciones', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Aspectos legales del derecho internacional privado', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Derecho e innovación en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'El concubinato y la legislación venezolana', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Bienes patrimoniales y extra patrimoniales', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Métodos alternos de solución de conflictos en el derecho privado venezolano', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Derecho mercantil', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Impacto de la legislación venezolana para las nuevas inversiones', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Marco legal de los nuevos medios de financiamiento', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Régimen jurídico del comercio electrónico', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'La globalización y su influencia en la legislación económica interna', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Derecho marítimo internacional', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Derecho del mar', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'El seguro privado en Venezuela desde una nueva visión', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Régimen jurídico del proceso civil venezolano', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],
            [
            'nombre' => 'Medios probatorios en la justicia venezolana', 
            'carrera_id' => 1, 
            'linea_id' => 0 
            ],

            [
            'nombre' => 'Reforma constitucional', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Constitucionalismo social', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Legalidad de los procesos cooperativos', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Participación ciudadana en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Derecho parlamentario y parlamentarismo social', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Derecho internacional público', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Derecho informático', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Métodos alternos de solución de conflictos como nuevo paradigmaconstitucional', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Derecho administrativo', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Sistema jurídico tributario', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Régimen legal de las aduanas', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Aspectos legales de la actividad turísticas en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
            [
            'nombre' => 'Derecho del turismo y desarrollo sustentable', 
            'carrera_id' => 1, 
            'linea_id' => 1 
            ],
    	/* -----DERECHO------ */

            [
            'nombre' => 'Régimen legal de prevención, protección y tratamiento a la mujermaltratada', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Delincuencia económica', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Seguridad ciudadana y control del delito', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Derecho penal del trabajo', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Nuevas tendencias del derecho penal en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Delincuencia organizada', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Política criminal', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Administración de justicia penal', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
            [
            'nombre' => 'Administración de justicia militar', 
            'carrera_id' => 1, 
            'linea_id' => 2 
            ],
    	// Derecho privado

            [
            'nombre' => 'Derecho internacional humanitario', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Influencia de los derechos humanos en el nuevo sistema de administraciónnde justicia', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Sistema penal y derechos humanos', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'El trabajo como un derecho humano', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Derecho internacional de los refugiados', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Impacto del derecho migratorio y su globalización', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Métodos de protección de derechos humanos', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Sistema universal de protección de los derechos humanos', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
            [
            'nombre' => 'Progresividad de los derechos humanos', 
            'carrera_id' => 1, 
            'linea_id' => 3 
            ],
        //Formacion ciudadana

            [
            'nombre' => 'Nuevas tendencias sobre seguridad social y ambientes de trabajo', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Régimen jurídico de las relaciones jurídico-laborales', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'El factor social trabajo y su régimen legal', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Globalización como proceso evolutivo en la actividad laboral', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Impacto de la legislación laboral en el desarrollo económico de la península de Paraguaná', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Métodos alternativos de solución de conflictos en la legislación laboral', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Derecho de protección del niño, niña y adolescente en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Atención jurídica a la población infantil en situación de exclusión social', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Métodos alternativos de solución de conflictos en el sistema de protección de la niñez y la adolescencia', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Régimen penal de los adolescentes', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Régimen legal de filiación y la relación parental en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Administración del proceso de derecho de la niñez y la adolescencia', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Factor del derecho agrario y su régimen legal', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Nuevas tendencias del derecho social en Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
            [
            'nombre' => 'Derecho ambiental y su impacto en el desarrollo sustentable y sostenible de Venezuela', 
            'carrera_id' => 1, 
            'linea_id' => 4 
            ],
        //Sistema penal y administracion de justicia

        //Derechos humanos

        //Derecho social

        /* ------INGENIERIA AMBIENTAL------- */
        ];

        areaTematica::insert($areas_tematicas);
    }
}