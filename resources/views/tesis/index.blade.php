@extends ('layouts.admin')
@section ('content')
  @if(Session::has('message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif



</head>
<body>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3 class="widget-title"><span id="noticia">Listado de Tesis</span></h3>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Busqueda:</h3>
            <div class="pull-right">
              <span class="clickable filter" data-toggle="tooltip" title="Click para buscar" data-container="body">
                <i class="glyphicon glyphicon-filter"></i>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Escriba para realizar la busqueda" />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>Imagen</th>
                <th><input type="text" class="form-control" placeholder="Tema"  disabled=""></th>
                <th><input type="text" class="form-control" placeholder="Introduccion"  disabled=""></th>
                <th><input type="text" class="form-control" placeholder="Autor"  disabled=""></th>
                <th><input type="text" class="form-control" placeholder="Indicador" disabled="" ></th>
                <th><input type="text" class="form-control" placeholder="Carrera" disabled=""></th>
                <th><input type="text" class="form-control" placeholder="Metodologia" disabled=""></th>
                <th>Ver</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tesis as $t)
                <tr>
                  <td>
                    <img src="{{asset('/imagenes/tesis/'.$t->imagen)}}"  height="50px" width="50px" class="img-thumbail">
                  </td>

                              <td>{!! $t->tema!!}</td>
                              <td>{!! $t->introduccion!!}</td>
                              <td>{{ $t->autor}}</td>
                              <td>{{ $t->nombre}}</td>
                              <td>{{ $t->carrera}}</td>
                              <td>Metodologia</td>

                              <td>
                               <a href="/tesis/{{$t->id}}" ><img src="/archivos/iconopdf.png" alt="" height="30px" width="30px"></a>

                              </td>

                             </div>
                       </tr>
                  @empty
                  <div class="alert alert-dismissable alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h4>Mensaje del sistema!</h4>
                        <p>Actualmento no se encuentran registros para este tipo</p>
                  </div>
                  @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

{!!Html::script('js/tabla.js')!!}
<script type="text/javascript">
function ShowSelected()
  {

    var id =$("#seleccion option:selected").val();
    document.getElementById('capturar').value = id;
  }

 </script>
</body>
</html>
@stop
