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
              <h3 class="panel-title">Listado de Indicadores</h3>
              <h3 class="panel-title">Actualmente se encuentran registrados <b>{{$indicadores->total()}}</b></h3>
            </div>
            <div class="col-lg-8 col-xs-12 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-primary" data-target="#modal-create" data-toggle="modal"><em class="fa fa-pencil">Crear Nuevo</em></button>
              <a href="/informe">
                <button type="button" class="btn btn-sm btn-primary btn-create">Ver Precios</button>
              </a>
              <a href="/tipo/">
                <button type="button" class="btn btn-sm btn-primary btn-create">Listar Tipos Indicadores</button>
              </a>

            </div>
          </div>
          @include('buscador')
          @include('indicador.modal-create')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th><em class="fa fa-cog"></em></th>
                  <!-- <th class="hidden-xs">ID</th> -->
                  <th>Nombre</th>
                  <th>Nombre de la Institucion</th>
                  <th>Tipo Indicador</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($indicadores as $i)
                  <td align="center">
                    <a class="btn btn-default" data-target="#modal-edit-{{$i->id}}" data-toggle="modal"><em class="fa fa-pencil"></em></a>
                  </td>
                  <!-- <td>{{ $i->id}}</td> -->
                  <td>{!! $i->nombre!!}</td>
                  <td>{!! $i->nombres!!}</td>
                  <td>{{ $i->tipo}}</td>
                </tr>
                @include('indicador.modaledit')
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            {{$indicadores->render()}}
          </div>
        </div>
      </div>
    </div>

  </div></div></div>
  @stop