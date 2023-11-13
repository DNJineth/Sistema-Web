<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Estudiantes;
use Illuminate\Http\Request;
use DB;
use \stdClass;
class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes=Estudiantes::all();
        //return response($estudiantes);
        return view('dash.estudiantes', compact('estudiantes'))->with('success', 'Datos listados correctamente');
       
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

       
        $crear_estudiante=new Estudiantes;
        
        $crear_estudiante->cedula=$request->cedula;
        $crear_estudiante->Codigo_estudiante=$request->Codigo;
        $crear_estudiante->Nombres_completos=$request->nombres;
        $crear_estudiante->correo=$request->email;
        $crear_estudiante->password=md5($request->password);
        //$crear_estudiante->save();
        // Crear un array con los datos que quieres pasar a la vista
    $datos = [
        'cedula' => $crear_estudiante->cedula,
        'Codigo_estudiante' => $crear_estudiante->Codigo_estudiante,
        'Nombres_completos' => $crear_estudiante->Nombres_completos,
        'correo' => $crear_estudiante->correo,
    ];

    // Redirigir a la vista de dashboard con los datos
    return view('dash.perfil', compact('datos'))->with('success', 'Datos guardados correctamente');
        return response("Datos guardados correctamente");
    }

    public function login(Request $request){
        $data=DB::table("estudiantes")->where(
            [ 
                ["correo","=",$request->email],
                ["password","=",md5($request->pass)],
            ]   
          )->first();
          if($data==null){
            $data =  new \stdClass();
            $data->status="Error";
            return redirect()->back()->with('error', 'your message,here');   
            return response()->json($data);
          }else{
            $data->status="Ok";
            return response()->json($data);
          }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
