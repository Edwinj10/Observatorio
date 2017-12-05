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
              <h3 class="panel-title">Listado de Precios de Indicadores</h3>
            </div>
            <div class="col-md-6 text-right col-xs-12">
            <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal">Agregar Precio</button>

          </a>
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

              <!-- <th>ID</th> -->
              <th>Tipo</th>
              <th>Dia</th>
              <th>Mes</th>
              <th>Año</th>
              <th>Cantidad</th>
            </tr> 
          </thead>
          <tbody>

            <tr>
              @foreach ($ind as $inf)
              <td align="center">
                <a class="btn btn-default" data-target="#modal-edit-{{$inf->Id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                <a class="btn btn-primary" href="/indicadoresid/{{$inf->id}}"><em class="fa fa-eye"></em></a>
              </td>

              <!-- <td>{!! $inf->Id!!}</td> -->
              <td>{!! $inf->nombre!!}</td>
              <td>{!! $inf->dia!!}</td>
              <td>{!! $inf->mes!!}</td>
              <td>{!! $inf->anio!!}</td>
              <td>{{$inf->precio}}</td>

            </tr>
            @include("informe.modal-edit")
            @include("informe.modal-create")
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div></div></div>
@stop