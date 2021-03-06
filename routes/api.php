<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* API */

Route::apiResources(['carrera' => 'App\Http\Controllers\API\CarreraController']);
Route::apiResources(['linea' => 'App\Http\Controllers\API\LineaController']);
Route::apiResources(['areasTematicas' => 'App\Http\Controllers\API\AreaTematicaController']);
Route::apiResources(['trabajo' => 'App\Http\Controllers\API\TrabajoController']);
Route::apiResources(['users' => 'App\Http\Controllers\API\UserController']);
Route::apiResources(['notificaciones' => 'App\Http\Controllers\API\NotificacionesUsuarioController']);



/* Index particulares */

/******************************* NOTA IMPORTANTE ******************************
*
*	Esto se puede realizar también con laravel scopes. Investigar eso
*    Y tambien se puede hacer con Computed Properties. Investgar eso
*
*/


//Trabajos Especiales
Route::get('trabajo_by_carrera/{carrera}', [App\Http\Controllers\API\TrabajoController::class, 'indexPorCarrera']);
Route::get('trabajo_by_rama/{carrera_id}/{rama_id}', [App\Http\Controllers\API\TrabajoController::class, 'indexPorRama']);
Route::get('trabajos-paginados', [App\Http\Controllers\API\TrabajoController::class, 'indexList']);
Route::put('aprobar/{id}', [App\Http\Controllers\API\TrabajoController::class, 'aprobar']);
Route::put('rechazar/{id}', [App\Http\Controllers\API\TrabajoController::class, 'rechazar']);
Route::post('buscarTrabajo', [App\Http\Controllers\API\TrabajoController::class, 'buscarTrabajo']);

//Carreras
Route::get('carreras-paginadas', [App\Http\Controllers\API\CarreraController::class, 'indexList']);
Route::get('index_carreras_formateados', [App\Http\Controllers\API\CarreraController::class, 'formatearCarrerasAtlasSelect']);

// Usuarios 
Route::get('index_estudiantes', [App\Http\Controllers\API\UserController::class, 'getEstudiantes']);
Route::get('index_estudiantes_formateados', [App\Http\Controllers\API\UserController::class, 'formatearEstudiantesAtlasSelect']);
Route::get('get_estudiante/{id}', [App\Http\Controllers\API\UserController::class, 'getEstudiante']);

// Lineas
Route::get('lineas-paginadas', [App\Http\Controllers\API\LineaController::class, 'indexList']);
Route::get('index_lineas_formateados', [App\Http\Controllers\API\LineaController::class, 'formatearLineasAtlasSelect']);

//Areas Tematicas
Route::get('index_areas_tematicas_formateados', [App\Http\Controllers\API\AreaTematicaController::class, 'formatearAreasTematicasAtlasSelect']);

//Perfil
Route::post('cambiar_imagen', [App\Http\Controllers\API\UserController::class, 'imagenPerfil']);
//Notificaciones
Route::get('get_notificaciones/{id}', [App\Http\Controllers\API\NotificacionesUsuarioController::class, 'indexNotificaciones']);