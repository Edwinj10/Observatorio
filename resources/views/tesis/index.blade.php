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
              <h3 class="panel-title">Listado de Tesis</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$tesis->total()}}</b></h3><br>
            </div>
            <div class="col col-xs-6 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
            </div>
          </div>
          <br>
          @include('buscador')
          @include('tesis.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Tema</th>
                  <th>Introduccion</th>
                  <th>Autor</th>
                  <!-- <th>Indicador</th> -->
                  <th>Carrera</th>
                  <!-- <th>Metodologia</th> -->
                  <th>Archivo</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($tesis as $t)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$t->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" id="borrar" data-target="#modal-delete-{{$t->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>

                  <td>{!! $t->tema!!}</td>
                  <td>{{substr(strip_tags($t->introduccion), 0,200)}}...</td>
                  <td>{{ $t->autor}}</td>
                  <!-- <td>{{ $t->nombre}}</td> -->
                  <td>{{ $t->carrera}}</td>
                  <!-- <td>{{$t->metodologia}}</td> -->
                  <td><a href="/archivos/tesis/{{$t->archivo}}">{{substr(strip_tags($t->archivo), 0,10)}}...</a></td>
                </tr>
                @include('tesis.modal')
                @include('tesis.modaledit')

                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-8">
              {{$tesis->render()}}
            </div>
          </div>
        </div>
      </div>

    </div></div></div>
    @push ('scripts')
    {!!Html::script('/js/tabla.js')!!}
    <script type="text/javascript">
      $(document).ready(function(){
        $("#ver").click(function(){
          $('.btn-danger').toggle(1000);
        });
      });
      $(document).ready(function(){
        $(".btn-danger").hide();
      });
  // $(document).ready(function(){
  //   $(".btn-primary").click(function(){
  //     seleccionar();
  //     seleccion();
  //   });
  // });

  // $(document).ready(function(){
  //     $('#ver').click(function(){
  //       $(".btn-danger").show();
  //     });
  //   });
  // function mostrar()
  // {
  //   $(document).ready(function(){
  //     $('#ver').click(function(){
  //       $(".btn-danger").hide();
  //     });
  //   });
  // }
</script>
@endpush
@stop