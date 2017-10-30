@extends ('layouts.admin')
@section ('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@include('error.error')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">Listado de Usuario</h3>
              <h3 class="panel-title">Actualmente se encuentran registrados <b>{{$usuarios->total()}}</b></h3>
              <div class="form-group">
                <h3 class="panel-title"><b>Filtrar por tipo:</b></h3>
                <select name="tipo" class="form-control selectpicker" data-live-search="true" onchange="Seleccionar();" id="tipo">
                  <option value="">Eliga una opcion</option>
                  @foreach ($user as $us)
                  <option value="{{$us->tipo}}">{{$us->tipo}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col col-xs-6 text-right">

              <button type="button" class="btn btn-sm btn-primary btn-create" name="nuevo" id="nuevo">Crear Nuevo</button>

            </div>
          </div>
          @include('buscador')

        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Tipo de Usuario</th>
                  <th>Foto</th>
                  <th>Facebook</th>
                  <th>Twiter</th>
                  <!-- <th>Google+</th> -->
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($usuarios as $usuario)
                  <td align="center">
                    <a class="btn btn-default" href="" data-target="#modal-edit-{{$usuario->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                    @include('usuarios.modal-delete') 
                    @include('usuarios.modal')

                  </td>
                  <td>{{ $usuario->name}}</td>
                  <td>{{ $usuario->email}}</td>
                  <td>{{ $usuario->tipo}}</td>
                  <td>
                    <img src=" {{asset('/imagenes/usuarios/'.$usuario->foto)}}" alt="" height="50px" width="50px">
                  </td>
                  <td>{{ $usuario->facebook}}</td>
                  <td>{{ $usuario->twiter}}</td>
                  <!-- <td>{{ $usuario->googleplus}}</td> -->
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="panel-footer">
              <div class="row">
                <div class="col-xs-8">
                  {{$usuarios->render()}}
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div></div></div>
    @push ('scripts')
    <script type="text/javascript">
      $("#nuevo").click(function(event)
      {
        document.location.href = "{{route('usuarios.create')}}";
      });
      function Seleccionar()
      {
        var cap=$('#tipo option:selected').val();
        var rutas='/usuarios/tipo/' + cap;
        console.log(cap);
        window.location.href=rutas;
      }
    </script>
    <!-- <script type="text/javascript">
      $(document).ready(function(){
        listar_Usuarios();
      });

      $(document).on("click", ".pagination li a", function(e){
        e.preventDefault();
        var url = $(this).attr("href");

        $.ajax({
          type: 'get',
          url: url,
          success:function(data){
            $('#listar_usuarios').empty().html(data);
          }
        });
      });
      $("#nuevo").click(function(event)
      {
        document.location.href = "{{route('usuarios.create')}}";
      });
      var listar_Usuarios=function()
      {
        $.ajax({
          type:'get',
          url: '{{url('listall')}}',
          success:function(data){
            $('#listar_usuarios').empty().html(data);
          }
        });
      }
    </script> -->
    @endpush
    @stop