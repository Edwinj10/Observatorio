@extends ('layouts.principal')
@section ('content')
  @if(Session::has('message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
  
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row">
  <div class="col-md-3">
      <img src="/imagenes/instituciones/{{$inst->logo}}" height="250px" width="250px" alt="">
  
  </div>
  <div class="col-md-9">
    <div class="col-md-6">
      <h3>Mision:</h3>
      <p class="text-justify">{{$inst->mision}}</p>
    </div>
    <div class="col-md-6">
      <h3>Vision:</h3>
      <p class="text-justify">{{$inst->vision}}</p>
    </div>
     <div class="col-md-12">
      <h3>Dirección:</h3>
      <p class="text-justify">{{$inst->direccion}}</p>
    </div>
  </div>

</div>     
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h4>Indicadores de {{$inst->nombres}} </h4>
            
  </div>
</div>
<div class="container-fluid">
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
</div>
    
{!!Html::script('js/tabla.js')!!}
<script type="text/javascript">

</script>
</body>
</html>







@stop

