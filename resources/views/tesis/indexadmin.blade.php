@extends ('layouts.admin')
@section ('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

{!!Html::style('/css/estilotabla.css')!!}
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de tesis </h3>
      
    </div>
  </div>


  <div class="container-fluid">

    <div class="row">
      <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">Users</h3>
          <div class="pull-right">
            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Buscar</button>
          </div>
        </div>        

        <div class="table-responsive">
          <table class="table">
            <thead id="encabesado_tabla">
              <tr class="filters">
                <th>Imagen</th>
                <th><input type="text" class="form-control" placeholder="Tema" ></th>
                <th><input type="text" class="form-control" placeholder="Introduccion" ></th>
                <th><input type="text" class="form-control" placeholder="Autor" ></th>
                <th><input type="text" class="form-control" placeholder="Indicador" ></th>
                <th>PDF</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tesis as $t)
              <tr>
                <td>
                  

                  <img src="{{asset('archivos/tesis/'.$t->imagen)}}"  height="50px" width="50px" class="img-thumbail">
                </td>

                <td>{!! $t->tema!!}</td>
                <td>{!! $t->introduccion!!}</td>
                <td>{{ $t->autor}}</td>
                <td>{{ $t->nombre}}</td>

                <td>
                 <a href="/tesis/{{$t->id}}" ><img src="/archivos/iconopdf.png" alt="" height="30px" width="30px"></a>
                 
               </td>
               <td>

                <a href="{{ route('tesis.edit', $t->id) }}" ><button class="btn btn-info">Editar</button></a>
              </td>
              
            </div>
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

