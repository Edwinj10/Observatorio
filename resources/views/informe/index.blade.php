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
              <h3 class="panel-title">Listado de Precios de Indicadores</h3>
            </div>
            <div class="col col-xs-6 text-right">
              <a href="/indicador/">
                <button type="button" class="btn btn-sm btn-primary btn-create">Crear Nuevo</button>
              </a>
              <a href="/informe/create">
                <button type="button" class="btn btn-sm btn-primary btn-create">Agregar Precio</button>
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
                  <th>Tipo</th>
                  <th>Dia</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Precio</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @foreach ($informe as $inf)
                  <td align="center">
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-primary" href="/indicadoresid/{{$inf->id}}"><em class="fa fa-eye"></em></a>
                  </td>

                  <td>{!! $inf->nombre!!}</td>
                  <td>{!! $inf->dia!!}</td>
                  <td>{!! $inf->mes!!}</td>
                  <td>{!! $inf->anio!!}</td>
                  <!--  -->
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col col-xs-4">
              Pagina {{$informe->currentPage()}} de {{$informe->lastPage()}}
            </div>
            <div class="col col-xs-8">
              <ul class="pagination hidden-xs pull-right">
                {{$informe->render()}}
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