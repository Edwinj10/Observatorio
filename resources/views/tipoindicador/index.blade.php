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
            <div class="col-lg-4 col-xs-12">
              <h3 class="panel-title">Listado de Tipos de Indicadores</h3><br>  
              <h3 class="panel-title">Actualmente se encuentran registrados <b>{{$tipo->total()}}</b></h3>
            </div>
            <div class="col-lg-8 col-xs-12 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <a href="/indicador">
                <button type="button" class="btn btn-sm btn-primary btn-create">Ver Indicadores</button>
              </a>
            </div>
          </div>
          @include('buscador')
          @include('tipoindicador.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                 <!--  <th>Id</th> -->
                  <th>Tipo</th>
                  <th>Imagen</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($tipo as $t)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$t->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                  </td>
                  <!-- <td>{{ $t->id}}</td> -->
                  <td>{!! $t->tipo!!}</td>
                  <td>
                    <img src="{{asset('imagenes/tipos_indicadores/'.$t->imagen)}}" alt="{{ $t->tipo}}" height="100px" width="100px" class="img-thumbail">
                  </td>    </tr>
                  @include('tipoindicador.modal')
                  @endforeach 
                </tbody>
              </table>
            </div>

          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col col-xs-8">
                
                {{$tipo->render()}}
                
              </div>
            </div>
          </div>
        </div>

      </div></div></div>
      @push ('scripts')
      
      @endpush
      @stop