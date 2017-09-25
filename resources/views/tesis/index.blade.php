@extends ('layouts.principal')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/tesis.css')}}">
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
                <h3 class="panel-title">Tesis</h3>
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
                        <th><input type="text" class="form-control" placeholder="Carrera" ></th>
                        <th>PDF</th>
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
    
{!!Html::script('/js/tabla.js')!!}
<script type="text/javascript">

</script>
</body>
</html>







@stop

