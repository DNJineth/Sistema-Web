@extends('dash.index')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Actualizar de estudiante</h1>
@if (session('actualizar'))
    <div class="alert alert-success" role="alert">
    Estudiante eliminado con exito
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
    <form action="{{ route('actualizar_fin',$estudiante->id) }}" method="post" role="form" class="php-email-form">
            @csrf
              <div class="row">

              
              <div class="form-group col-md-6">
                  <label for="name">Cedula</label>
                  <input type="text" name="cedula" value="{{$estudiante->cedula}}" class="form-control" id="cedula" placeholder="Número de documento" required>
                </div>
              <div class="form-group col-md-6">
                  <label for="name">Código Estudiante</label>
                  <input type="text" name="Codigo" value="{{$estudiante->Codigo_estudiante}}"  class="form-control" id="name" placeholder="Código Estudiante" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Nombres Completos</label>
                  <input type="text" name="nombres"  value="{{$estudiante->Nombres_completos}}"  class="form-control" id="name" placeholder="Nombres Completos" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Correo Electronico</label>
                  <input type="email" class="form-control" value="{{$estudiante->correo}}"  name="email" id="email" placeholder="Correo Electronico" required>
                </div>
                
              </div>
              <div class="text-center"><button class="btn btn-warning" type="submit">Actualizar</button></div>
            </form>
    </div>
</div>

</div>
@endsection
