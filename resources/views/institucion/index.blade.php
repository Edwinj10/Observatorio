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
              <h3 class="panel-title">Listado de Instituciones</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$instituciones->total()}}</b></h3>
            </div>
            <div class="col col-xs-6 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
            </div>
          </div>
          @include('buscador')
          @include('institucion.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Mision</th>
                  <th>Vision</th>
                  <th>Logo</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($instituciones as $inst)
                  <td align="center">
                    <a class="btn btn-default" href="" data-target="#modal-edit-{{$inst->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <!-- <a class="btn btn-danger" href="" data-target="#modal-delete-{{$inst->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a> -->
                  </td>
                  <td>{{ $inst->nombres}}</td>
                  <td>{!! $inst->direccion!!}</td>
                  <td>{{ $inst->mision}}</td>
                  <td>{{ $inst->vision}}</td>
                  <td>
                    <img src="{{asset('imagenes/instituciones/'.$inst->logo)}}" alt="{{ $inst->titulo}}" height="100px" width="100px" class="img-thumbail">
                  </td>
                </tr>
                <!-- @include('institucion.modal')  -->
                @include('institucion.modaledit')
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-8">
              {{$instituciones->render()}}
            </div>
          </div>
        </div>
      </div>

    </div></div></div>
    @push ('scripts')
   <!-- <script>
    function ellipsisJS ( containerId , largomaximo) {
      var $container = $("#" + containerId); 
      var $text = $("#descripcion h4");    

      while ( $container.text().length > largomaximo ) {
        $text.text(function (index, text) {
          return text.replace(/\W*\s(\S)*$/, '...');
        });
      }
    }

    ellipsisJS("descripcion", 200);  
  </script> -->
  @endpush
    @stop