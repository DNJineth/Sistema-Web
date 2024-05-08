<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Estudiantes;
use Illuminate\Http\Request;
use DB;
use \stdClass;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProgresoController;
use Illuminate\Support\Facades\Validator;
use App\Mail\emailsremember;
use Illuminate\Support\Facades\Mail;
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
    public function notas_evaluacion()
    {

       $evaluaciones = DB::table('evaluacions')
        ->join('estudiantes', 'evaluacions.estudiantes_id', '=', 'estudiantes.id')
        ->select('estudiantes.Codigo_estudiante', 'estudiantes.Nombres_completos', 'estudiantes.cedula', DB::raw("GROUP_CONCAT(tema_evaluacion, ':', nota) AS evaluaciones"))
        ->groupBy('evaluacions.estudiantes_id', 'estudiantes.Codigo_estudiante', 'estudiantes.Nombres_completos', 'estudiantes.cedula')
        ->get();

    $evaluaciones_array = [];

    foreach ($evaluaciones as $evaluacion) {
        $evaluaciones_individuales = explode(',', $evaluacion->evaluaciones);
        $evaluaciones_estudiante = [];
        foreach ($evaluaciones_individuales as $evaluacion_individual) {
            list($tema, $nota) = explode(':', $evaluacion_individual);
            $evaluaciones_estudiante[$tema] = $nota;
        }
        $evaluaciones_array[] = [
            'Codigo_estudiante' => $evaluacion->Codigo_estudiante,
            'Nombres_completos' => $evaluacion->Nombres_completos,
            'cedula' => $evaluacion->cedula,
            'evaluaciones' => $evaluaciones_estudiante
        ];
    }


        //return response($estudiantes);
        return view('dash.evaluacion', compact('evaluaciones_array'))->with('success', 'Datos listados correctamente');
       
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
        $validator = Validator::make($request->all(), [
            'cedula' => 'required|unique:estudiantes,cedula',
            'Codigo' => 'required|unique:estudiantes,Codigo_estudiante',
           
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error_existe', 'Datos guardados correctamente');
        }

        $crear_estudiante=new Estudiantes;
        $crear_estudiante->cedula=$request->cedula;
        $crear_estudiante->Codigo_estudiante=$request->Codigo;
        $crear_estudiante->Nombres_completos=$request->nombres;
        $crear_estudiante->correo=$request->email;
        $crear_estudiante->password=md5($request->password);
        $crear_estudiante->save();
        // Crear un array con los datos que quieres pasar a la vista
    $datos = [
        'cedula' => $crear_estudiante->cedula,
        'Codigo_estudiante' => $crear_estudiante->Codigo_estudiante,
        'Nombres_completos' => $crear_estudiante->Nombres_completos,
        'correo' => $crear_estudiante->correo,
    ];
    session(['usuario' => $crear_estudiante]);
    session()->forget('admin');
    session(['rol' => "estudiante"]);

    return Redirect::route('gestion-perfil');
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
             
            return response()->json($data);
          }else{
            $data->status="Ok";
           
            return response()->json($data);
          }
    }


    
    public function login_web(Request $request){
      
        if($request->email=="administrador@mentorydata.tech" && $request->pass=="123456789" ){
            session(['admin' => "estudiante"]);
            $data =  new \stdClass();
            $data->cedula="11111";
            $data->Codigo_estudiante="I01111";
            $data->Nombres_completos="Administrador";
            $data->correo="administrador@mentorydata.tech";
            session(['usuario' => $data]);
            session()->forget('rol');
            session(['admin' => "administrador"]);
            return Redirect::route('gestion-perfil');
        }

      

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
            session(['usuario' => $data]);
            session()->forget('admin');
            session(['rol' => "estudiante"]);
            return Redirect::route('gestion-perfil');
            return view('dash.perfil')->with('success', 'Datos guardados correctamente');
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

    public function perfil(){
        
        $usuarioAlmacenado = session('usuario');
        
        //return response($estudiantes);
        return view('dash.perfil', compact('usuarioAlmacenado'))->with('success', 'Datos listados correctamente');
    }

    public function avanze_curso($id_estudiante){
        
        $otroControlador = new ProgresoController();
        $resultado = $otroControlador->obtenerInformacionPorEstudiante($id_estudiante);
        $curso=[];
     
        return view('dash.avanze', compact('curso',"resultado"))->with('success', 'Datos listados correctamente');

    }

    public function enviar_correo($cedula){

        $estudiante=DB::table("estudiantes")->where("cedula","=",$cedula)->first();
        $informacion="Prueba correo";

        $data_array=[
            "Nombres_completos"=>$estudiante->Nombres_completos,
            "correo"=>$estudiante->correo,
            "codigo"=> self::getUrlWithSuffix("/".$estudiante->password)
        ];
        
        Mail::to($estudiante->correo)->send( new emailsremember($data_array));
        return response(["data"=>$data_array]);
    }

    function getUrlWithSuffix($codigo) {
    
        $url = url()->current();// Obtener la URL actual
        $url .= $codigo; // Concatenar "/1223" al final de la URL
        
        return $url;
    }

    public function cambiar_contra($cedula,$codigo){
        return view("restablecer",compact("cedula","codigo"));
        return response(["ce"=>$cedula,"c"=>$codigo]);
    }
    public function editar_contra(Request $request){
       
        if($request->password != $request->password_1){
            return redirect()->back()->with('dif', 'Las contraseñas no cohinciden');
        }
        $est = DB::table('estudiantes')
        ->where('cedula', $request->cedula)
        ->where('password', $request->Codigo)
        ->get();
    
    if ($est->count() > 0) {
        DB::table('estudiantes')
            ->where('cedula', $request->cedula)
            ->where('password', $request->Codigo)
            ->update(['password' => md5($request->password)]);
            return redirect()->route('salir');
            return response(["ates"=>$request->all() ,"ahoora"=>$est]);
    } else {
        return redirect()->back()->with('keybat', 'Las contraseñas no cohinciden');
    }
       
    }
}
