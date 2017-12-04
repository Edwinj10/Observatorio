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
              <h3 class="panel-title">Listado de Imagenes de portada</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$imagenes->total()}}</b></h3>
            </div>
            <div class="col col-xs-6 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
            </div>
            @include('imagenes.modal-create')
          </div>
          @include('buscador')
        </div>
        <br>  
        <div class="alert alert-success">Nota: Las imagenes deben de ser de un tamaño de 425px de ancho y 800 px de alto. Si se ingresa una imagen de un tamaño mayor o menor, la aplicacion cambiara el tamaño de la imagen automaticamente, a la medida antes mencionada.</div><br> 
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Titulo</th>
                  <th>Creador</th>
                  <th>Imagen</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($imagenes as $i)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$i->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" data-target="#modal-delete-{{$i->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>

                  <td>{{ $i->titulo}}</td>
                  <td>{{ $i->name}}</td>
                  <td>
                    <img src="{{asset('imagenes/imagenes/'.$i->foto)}}" alt="{{ $i->titulo}}" height="100px" width="100px" class="img-thumbail">
                  </td>
                </tr>
                @include('imagenes.modal') 
                @include('imagenes.modaledit')
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-xs-8">
              {{$imagenes->render()}}
            </div>
          </div>
        </div>
      </div>

    </div></div></div>
    @push ('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
        $("#ver").click(function(){
          $('.btn-danger').toggle(1000);
        });
      });
      $(document).ready(function(){
        $(".btn-danger").hide();
      });
    </script>
    @endpush
    @stop