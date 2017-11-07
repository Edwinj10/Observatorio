@extends ('layouts.principal')
@section ('content')
<link rel="stylesheet" href="{{asset('/css/listar.css')}}">
@if(Session::has('message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


</head>
<h3 class="widget-title"><span id="noticia">Perfil</span></h3>
<div class="row">
  
  <div class="col-md-3">
    <img src="/imagenes/instituciones/{{$inst->logo}}" height="250px" width="250px" alt="">
    
  </div>
  <div class="col-md-9">
    <div class="col-md-6">
      <h3>Misión:</h3>
      <p class="text-justify">{{$inst->mision}}</p>
    </div>
    <div class="col-md-6">
      <h3>Visión:</h3>
      <p class="text-justify">{{$inst->vision}}</p>
    </div>
    <div class="col-md-12">
      <h3>Dirección:</h3>
      <p class="text-justify">{{$inst->direccion}}</p>
    </div>
  </div>

</div>     
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4>Total de Indicadores: {{$total}}</h4>    
  </div>
</div>
<h3 class="widget-title"><span id="noticia">Tipo de Indicadores de:  {{$inst->nombres}} </span></h3>
<div class="row">
  <section class="new-deal">
   <div class="container">
    @forelse ($ind as $i)
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 deal deal-block">
      <div class="item-slide">
        <div class="box-img-active">
          <img src="{{asset('imagenes/tipos_indicadores/'.$i->imagen)}}" alt="" alt=""/>
          <div class="text-wrap">
            <h4>{{$i->tipo}}</h4>
            <div class="desc">                  
              <span>Total Indicadores</span>
              <h3>{{$i->count}}</h3>
            </div>
            <div class="book-now-c">                
              <a href="/instituciones/{{$i->institucion_id}}/{{$i->indicador_id}}">Ver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
    @include('error.alert')
    @endforelse
  </div>
</div>
</section>

</div>
<!-- <div class="container-fluid">
    <div class="row">
        <div class="panel panel-primary filterable">
          <div class="panel-heading">
            <h3 class="panel-title">Indicadores</h3>
              <div class="pull-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Buscar</button>
              </div>
          </div>        
          <div class="table-responsive">
            <table class="table">
              <thead id="encabesado_tabla">
                <tr class="filters">
                  <th><input type="text" class="form-control" placeholder="Nombre" ></th>
                  <th><input type="text" class="form-control" placeholder="Fecha" ></th>
                  <th><input type="text" class="form-control" placeholder="Tipo" ></th>
                  <th><input type="text" class="form-control" placeholder="Precio" ></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($indicadores as $i)
                <tr>
                  <td>{{$i->nombre}}</td>   
                  <td>{{$i->dia}}/{{$i->mes}}/{{$i->anio}}</td>                                   
                  <td>Economico</td>                 
                  <td>{{$i->precio}}</td>
                  <td>
                    <a href="/mostrar/{{$i->institucion_id}}/{{$i->id}}" class="btn btn-primary">Ver</a>
                 </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>

        
    </div>
  </div> -->
  
  @stop

