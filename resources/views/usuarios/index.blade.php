@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Listado de Usuarios</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="/usuarios/create">
                      <button type="button" class="btn btn-sm btn-primary btn-create">Crear Nuevo</button>
                    </a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-list table-hover">
                    <thead>
                      <tr>
                          <th><em class="fa fa-cog"></em></th>
                          <!-- <th class="hidden-xs">ID</th> -->
                          <th>Name</th>
                          <th>Email</th>
                          <th>Tipo de Usuario</th>
                          <th>Foto</th>
                          <th>Facebook</th>
                          <th>Twiter</th>
                          <th>Google+</th>
                      </tr> 
                    </thead>
                    <tbody>
                            <tr>
                              @foreach ($usuarios as $usuario)
                              <td align="center">
                              <a class="btn btn-default" href="" data-target="#modal-edit-{{$usuario->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                              @include('usuarios.modal') 
                              </td>
                              <td>{{ $usuario->name}}</td>
                              <td>{{ $usuario->email}}</td>
                              <td>{{ $usuario->tipo}}</td>
                              <td><img src=" {{asset('/imagenes/usuarios/'.$usuario->foto)}}" alt="" height="50px" width="50px">
                              </td>
                              <td>{{ $usuario->facebook}}</td>
                              <td>{{ $usuario->twiter}}</td>
                              <td>{{ $usuario->googleplus}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                  </table>
                </div>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">
                    Pagina {{$usuarios->currentPage()}} de {{$usuarios->lastPage()}}
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      {{$usuarios->render()}}
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</div></div></div>
@stop