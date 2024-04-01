<?php

namespace App\Http\Controllers;

use App\Models\evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
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
       // Validación de los datos del formulario
    $validatedData = $request->validate([
        'estudiantes_id' => 'required|exists:estudiantes,id',
        'tema_evaluacion' => 'required',
        'nota' => 'required',
    ]);

    // Crear una nueva evaluación
    $evaluacion = new evaluacion;
    $evaluacion->estudiantes_id = $request->estudiantes_id;
    $evaluacion->tema_evaluacion = $request->tema_evaluacion;
    $evaluacion->nota = $request->nota;
    $evaluacion->save();
    return response(["data"=>"progreso guardado"]);
    // Aquí puedes redirigir a donde desees después de guardar la evaluación
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(evaluacion $evaluacion)
    {
        //
    }
}
