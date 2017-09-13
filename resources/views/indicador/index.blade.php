@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
  <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Publicaciones <a href="/indicador/create"><button class="btn btn-success">Nuevo</button></a></h3>
              <p>
                pagina {{$indicadores->currentPage()}}
                de {{$indicadores->lastPage()}}
              </p>
      </div>
  </div>
    
    
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">

        <thead>
          
          <th>Id</th>
          <th>Nombre</th>
          <th>Nombre de la Institucion</th>
          <th>Tipo Indicador</th>
          <th>Editar</th>
          <th>Eliminar</th>
          
        </thead>
        @foreach ($indicadores as $i)
        <tr>
          
          <td>{{ $i->id}}</td>
          <td>{!! $i->nombre!!}</td>
          <td>{!! $i->nombres!!}</td>
          <td>{{ $i->tipo}}</td>
          <td><a href="/exportar/{{$i->id}}/excel" class="btn-success">Exportar</a></td>
        </tr>
        
        
        @endforeach
      </table>
    </div>
    {{$indicadores->render()}}
  </div>
</div>      
@stop