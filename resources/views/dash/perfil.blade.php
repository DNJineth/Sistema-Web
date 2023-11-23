@extends('dash.index')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mi perfil</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        
    <form   class="php-email-form">
          
              <div class="row">

              
              <div class="form-group col-md-6">
                  <label for="name">Cedula</label>
                  <input type="text" name="cedula" class="form-control" id="cedula" value ="{{$usuarioAlmacenado->cedula}}" placeholder="Número de documento" required>
                </div>
              <div class="form-group col-md-6">
                  <label for="name">Código Estudiante</label>
                  <input type="text" name="Codigo" class="form-control" id="name" value ="{{$usuarioAlmacenado->Codigo_estudiante}}" placeholder="Código Estudiante" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Nombres Completos</label>
                  <input type="text" name="nombres" class="form-control" id="name" value ="{{$usuarioAlmacenado->Nombres_completos}}" placeholder="Nombres Completos" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" id="email" value ="{{$usuarioAlmacenado->correo}}" placeholder="Correo Electronico" required>
                </div>
                
              </div>
             
            </form>
    </div>
</div>

</div>
@endsection
