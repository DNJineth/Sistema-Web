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
});
Route::resource('estudiantes', 'EstudiantesController',['except'=>['create','edit']]);

Route::post("login","EstudiantesController@login");

Route::post("unity/login","EstudiantesController@login");