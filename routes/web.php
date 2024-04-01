<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('formulario', function () {
    return view('formulario');
})->name('salir');;
Route::resource('estudiantes', 'EstudiantesController',['except'=>['create','edit']]);
Route::resource('progreso', 'ProgresoController',['except'=>['create','edit']]);
Route::post("login","EstudiantesController@login_web");


Route::post("unity/login","EstudiantesController@login");
Route::post("unity/progreso","ProgresoController@store");
Route::post("unity/nota","EvaluacionController@store");

Route::get("estadistica/{estudiante_id}","ProgresoController@obtenerInformacionPorEstudiante");


Route::get("prueba", function(){
    return response(["data"=>"hola"]);
});

Route::get('dashboard', function () {
    return view('dash.index');
});
Route::get("notas_estudiante/","EstudiantesController@notas_evaluacion")->name('notas_estudiante');
Route::get('gestion-estudiantes', "EstudiantesController@index")->name('gestion-estudiantes');
Route::get('gestion-perfil', "EstudiantesController@perfil")->name('gestion-perfil');
Route::get('gestion-curso/{id_estudiante}', "EstudiantesController@avanze_curso")->name('gestion-curso');
///PROTOCOLOS HTTP
/// GET para obtener
/// POST para enviar datos
///PUT para actualizar
///DELETE para eliminar 