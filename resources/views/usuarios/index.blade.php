@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
  <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Usuarios <a href="/usuarios/create"><button class="btn btn-success">Nuevo</button></a></h3>
            <p>
                pagina {{$usuarios->currentPage()}}
                de {{$usuarios->lastPage()}}
              </p>
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <h3 align="center">Lista de Usuarios</h3>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Tipo de Usuario</th>
          <th>Foto</th>
          <th>Facebook</th>
          <th>Twiter</th>
          <th>Google+</th>
          <th>Editar</th>
          <th>Mostrar</th>
        </thead>
        @foreach ($usuarios as $usuario)
        <tr>
          <td>{{ $usuario->name}}</td>
          <td>{{ $usuario->email}}</td>
          <td>{{ $usuario->tipo}}</td>
          <td><img src=" {{asset('/imagenes/usuarios/'.$usuario->foto)}}" alt="" height="50px" width="50px">
          </td>
          <td>{{ $usuario->facebook}}</td>
          <td>{{ $usuario->twiter}}</td>
          <td>{{ $usuario->googleplus}}</td>
          <td>
            <a href="" data-target="#modal-edit-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
          </td>
          <td>
            <a href="{{ route('usuarios.show', $usuario->id ) }} " class="btn btn-primary">Ver</a>
          </td>
        @include('usuarios.modal')  
        
        @endforeach
      </table>
    </div>
    
  </div>
</div>      
@stop