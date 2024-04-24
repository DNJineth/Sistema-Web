@extends('dash.index')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lista de estudiantes por evaluacion</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Código Estudiante</th>
                        <th>Nombre Estudiante</th>
                        <th>No documento</th>
                        
                        <th>Nota</th>
                    </tr>
                </thead>
             
                <tbody>
                @foreach($evaluaciones_array as $evaluacion)
                    <tr>
                        <td>{{ $evaluacion['Codigo_estudiante'] }}</td>
                        <td>{{ $evaluacion['Nombres_completos'] }}</td>
                        <td>{{ $evaluacion['cedula'] }}</td>
                        <td> @foreach($evaluacion['evaluaciones'] as $tema => $nota)
                            <li>{{ $tema }}: {{ $nota }}</li>
                        @endforeach</td>
                        
                    </tr>
                @endforeach
                 
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection
