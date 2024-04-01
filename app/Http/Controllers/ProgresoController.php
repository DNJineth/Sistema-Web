<?php

namespace App\Http\Controllers;

use App\Models\progreso;
use Illuminate\Http\Request;

class ProgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudiantes_id' => 'required|numeric', // Ajusta las reglas de validación según tus necesidades
            'tema' => 'required|string',
            'modulo' => 'required|string',
        ]);
        // Comprobar si ya existe un registro con los mismos datos
        $registroExistente = Progreso::where('estudiantes_id', $request->estudiantes_id)
        ->where('tema', $request->tema)
        ->where('modulo', $request->modulo)
        ->first();

        if ($registroExistente) {
            return response(["data"=>"progreso guardado"]);
        }
        $registro = new progreso(); 
        $registro->estudiantes_id = $request->estudiantes_id;
        $registro->tema = $request->tema;
        $registro->modulo = $request->modulo;

        // Guardar el registro en la base de datos
        $registro->save();
        return response(["data"=>"progreso guardado"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\progreso  $progreso
     * @return \Illuminate\Http\Response
     */
    public function show(progreso $progreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\progreso  $progreso
     * @return \Illuminate\Http\Response
     */
    public function edit(progreso $progreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\progreso  $progreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, progreso $progreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\progreso  $progreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(progreso $progreso)
    {
        //
    }

    public function obtenerInformacionPorEstudiante($estudiante_id)
    {
        // Obtener los registros de la tabla filtrados por el ID del estudiante
        $registros = Progreso::where('estudiantes_id', $estudiante_id)->get();

        // Contar el número de registros para cada tema
        $conteo = $registros->groupBy('tema')->map(function ($items) {
            return $items->count();
        });

        return $conteo;
    }
}
