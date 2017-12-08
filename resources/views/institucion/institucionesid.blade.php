@extends ('layouts.principal')
@section ('content')
@section('title','Instituciones')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif



    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>



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
      <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
          <h3>{{$nombre->nombre}} </h3>
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
                  <th><input type="text" class="form-control" placeholder="Dia" ></th>
                  <th><input type="text" class="form-control" placeholder="Mes" ></th>
                  <th><input type="text" class="form-control" placeholder="Año" ></th>
                  <th><input type="text" class="form-control" placeholder="Precio" ></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($informe as $inf)
        <tr>
          
          <td>{!! $inf->dia!!}</td>
          <td>{!! $inf->mes!!}</td>
          <td>{!! $inf->anio!!}</td>
          <td>{{$inf->precio}}</td>

        </tr>
        

        
        @endforeach
              </tbody>
            </table>
          </div>
        </div>

        
    </div>
</div>




    
{!!Html::script('js/tabla.js')!!}
@stop