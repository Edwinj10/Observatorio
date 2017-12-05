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
            <div class="col-md-6 col-xs-12">
              <h3 class="panel-title">Listado de correos enviados dentro de la aplicacion</h3>
              <h3 class="panel-title">Actualmente se encuentran almacenados <b>{{$correo->total()}}</b></h3>
            </div>
            <div class="col-md-6 text-right col-xs-6">
              <button type="button" id="ver" class="btn btn-sm btn-primary btn-success">Eliminar</button>
            </div>
          </div>
          @include('buscador')
        </div>
        <br>   
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Descripcion</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($correo as $c)
                  <td align="center">
                    <a class="btn btn-danger" data-target="#modal-delete-{{$c->id}}" data-toggle="modal"><em class="fa fa-trash"></em></a>
                  </td>
                  <td>{{ $c->name}}</td>
                  <td>{{ $c->email}}</td>
                  <td>{{substr(strip_tags($c->descripcion), 0,200)}}...</td>
                </tr>
                @include('correo.modal-delete')
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-xs-8">
                {{$correo->render()}}
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