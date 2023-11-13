@extends('dash.index')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lista de estudiantes</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Codigo Estudiante</th>
                        <th>Nombres Completos</th>
                        <th>Correo</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
             
                <tbody>
                @foreach($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->cedula }}</td>
                        <td>{{ $estudiante->Codigo_estudiante }}t</td>
                        <td>{{ $estudiante->Nombres_completos }}</td>
                        <td>{{ $estudiante->correo }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-info btn-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </td>
                        <td class="text-center">
                                <a href="#" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                        </td>
                        
                    </tr>
                @endforeach
                 
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection
