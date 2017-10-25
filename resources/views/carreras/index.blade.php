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
            <div class="col-lg-4 col-xs-12">
              <h3 class="panel-title">Listado de Carreras</h3>
              <h3 class="panel-title">Actualmente se encuentran registradas <b>{{$carreras->total()}}</b></h3>
            </div>
            <div class="col-lg-8 col-xs-12 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
              <a href="/tesis">
                <button type="button" class="btn btn-sm btn-primary btn-create">Ver Tesis</button>
              </a>
            </div>
          </div>
          @include('buscador')
          @include('carreras.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <!-- <th>Id</th> -->
                  <th>Carrera</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($carreras as $c)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$c->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" id="borrar" data-target="#modal-delete-{{$c->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>
                  <!-- <td>{!! $c->id!!}</td> -->
                  <td>{!! $c->carrera!!}</td>
                </tr>
                @include('carreras.modal')
                @include('carreras.modaledit')
                @endforeach 
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-8">
              {{$carreras->render()}}

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