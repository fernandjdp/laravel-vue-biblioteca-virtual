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
    	/* -----DERECHO------ */

    	// Derecho privado
        areaTematica::create(array( 'id' => 0, 'nombre' => 'Derecho de autor y nuevas tecnologías', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 1, 'nombre' => 'Régimen legal del derecho privado', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 2, 'nombre' => 'Derecho de obligaciones', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 3, 'nombre' => 'Aspectos legales del derecho internacional privado', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 4, 'nombre' => 'Derecho e innovación en Venezuela', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 5, 'nombre' => 'El concubinato y la legislación venezolana', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 6, 'nombre' => 'Bienes patrimoniales y extra patrimoniales', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 7, 'nombre' => 'Métodos alternos de solución de conflictos en el derecho privado venezolano', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 8, 'nombre' => 'Derecho mercantil', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 9, 'nombre' => 'Impacto de la legislación venezolana para las nuevas inversiones', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 10, 'nombre' => 'Marco legal de los nuevos medios de financiamiento', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 11, 'nombre' => 'Régimen jurídico del comercio electrónico', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 12, 'nombre' => 'La globalización y su influencia en la legislación económica interna', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 13, 'nombre' => 'Derecho marítimo internacional', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 14, 'nombre' => 'Derecho del mar', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 15, 'nombre' => 'El seguro privado en Venezuela desde una nueva visión', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 16, 'nombre' => 'Régimen jurídico del proceso civil venezolano', 'carrera_id' => 1, 'linea_id' => 0 ));
        areaTematica::create(array( 'id' => 17, 'nombre' => 'Medios probatorios en la justicia venezolana', 'carrera_id' => 1, 'linea_id' => 0 ));

        //Formacion ciudadana
        areaTematica::create(array( 'id' => 18, 'nombre' => 'Reforma constitucional', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 19, 'nombre' => 'Constitucionalismo social', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 20, 'nombre' => 'Legalidad de los procesos cooperativos', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 21, 'nombre' => 'Participación ciudadana en Venezuela', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 22, 'nombre' => 'Derecho parlamentario y parlamentarismo social', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 23, 'nombre' => 'Derecho internacional público', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 24, 'nombre' => 'Derecho informático', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 25, 'nombre' => 'Métodos alternos de solución de conflictos como nuevo paradigmaconstitucional', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 26, 'nombre' => 'Derecho administrativo', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 27, 'nombre' => 'Sistema jurídico tributario', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 28, 'nombre' => 'Régimen legal de las aduanas', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 29, 'nombre' => 'Aspectos legales de la actividad turísticas en Venezuela', 'carrera_id' => 1, 'linea_id' => 1 ));
        areaTematica::create(array( 'id' => 30, 'nombre' => 'Derecho del turismo y desarrollo sustentable', 'carrera_id' => 1, 'linea_id' => 1 ));

        //Sistema penal y administracion de justicia
        areaTematica::create(array( 'id' => 31, 'nombre' => 'Régimen legal de prevención, protección y tratamiento a la mujermaltratada', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 32, 'nombre' => 'Delincuencia económica', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 33, 'nombre' => 'Seguridad ciudadana y control del delito', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 34, 'nombre' => 'Derecho penal del trabajo', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 35, 'nombre' => 'Nuevas tendencias del derecho penal en Venezuela', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 36, 'nombre' => 'Delincuencia organizada', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 37, 'nombre' => 'Política criminal', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 38, 'nombre' => 'Administración de justicia penal', 'carrera_id' => 1, 'linea_id' => 2 ));
        areaTematica::create(array( 'id' => 39, 'nombre' => 'Administración de justicia militar', 'carrera_id' => 1, 'linea_id' => 2 ));

        //Derechos humanos
        areaTematica::create(array( 'id' => 40, 'nombre' => 'Derecho internacional humanitario', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 41, 'nombre' => 'Influencia de los derechos humanos en el nuevo sistema de administraciónnde justicia', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 42, 'nombre' => 'Sistema penal y derechos humanos', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 43, 'nombre' => 'El trabajo como un derecho humano', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 44, 'nombre' => 'Derecho internacional de los refugiados', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 45, 'nombre' => 'Impacto del derecho migratorio y su globalización', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 46, 'nombre' => 'Métodos de protección de derechos humanos', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 47, 'nombre' => 'Sistema universal de protección de los derechos humanos', 'carrera_id' => 1, 'linea_id' => 3 ));
        areaTematica::create(array( 'id' => 48, 'nombre' => 'Progresividad de los derechos humanos', 'carrera_id' => 1, 'linea_id' => 3 ));

        //Derecho social
        areaTematica::create(array( 'id' => 49, 'nombre' => 'Nuevas tendencias sobre seguridad social y ambientes de trabajo', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 50, 'nombre' => 'Régimen jurídico de las relaciones jurídico-laborales', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 51, 'nombre' => 'El factor social trabajo y su régimen legal', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 52, 'nombre' => 'Globalización como proceso evolutivo en la actividad laboral', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 53, 'nombre' => 'Impacto de la legislación laboral en el desarrollo económico de la península de Paraguaná', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 54, 'nombre' => 'Métodos alternativos de solución de conflictos en la legislación laboral', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 55, 'nombre' => 'Derecho de protección del niño, niña y adolescente en Venezuela', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 56, 'nombre' => 'Atención jurídica a la población infantil en situación de exclusión social', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 57, 'nombre' => 'Métodos alternativos de solución de conflictos en el sistema de protección de la niñez y la adolescencia', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 58, 'nombre' => 'Régimen penal de los adolescentes', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 59, 'nombre' => 'Régimen legal de filiación y la relación parental en Venezuela', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 60, 'nombre' => 'Administración del proceso de derecho de la niñez y la adolescencia', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 61, 'nombre' => 'Factor del derecho agrario y su régimen legal', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 62, 'nombre' => 'Nuevas tendencias del derecho social en Venezuela', 'carrera_id' => 1, 'linea_id' => 4 ));
        areaTematica::create(array( 'id' => 63, 'nombre' => 'Derecho ambiental y su impacto en el desarrollo sustentable y sostenible de Venezuela', 'carrera_id' => 1, 'linea_id' => 4 ));

        /* ------INGENIERIA AMBIENTAL------- */
    }
}