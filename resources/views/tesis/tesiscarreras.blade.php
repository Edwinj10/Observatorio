@extends ('layouts.principal')
@section ('content')
</head>
<body>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3 class="widget-title"><span id="noticia">Listado de Tesis
      </span></h3>
      <h4 class="widget-title">Carrera: <b>@foreach ($tesis2 as $tes2)
        {{$tes2->carrera}} @endforeach</b></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
            </div>
          </div>
          @include('buscador')
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Tema</th>
                  <th>Autor</th>
                  <th>Carrera</th>
                  <th>Metodologia</th>
                  <th>Ver</th>
                </tr> 
              </thead>
              <tbody>
                <tr>
                  @forelse ($tesis as $t)
                  <td>
                    <img src="{{asset('/imagenes/tesis/'.$t->imagen)}}"  height="50px" width="50px" class="img-thumbail">
                  </td>
                  <td>{!! $t->tema!!}</td>
                  <td>{{ $t->autor}}</td>
                  <td>{{ $t->carrera}}</td>
                  <td>{{$t->metodologia}}</td>
                  <td>
                   <a href="/tesis/{{$t->id}}" ><img src="/archivos/iconopdf.png" alt="" height="30px" width="30px"></a>
                 </td>
               </tr>
               @empty
               @include('error.alert')
               @endforelse
             </tbody>
           </table>
         </div>

       </div>
       <div class="panel-footer" id="panelfo">
        <div class="row">
          <div class="col col-xs-8">
            <ul class="pagination hidden-xs pull-right">
              {{$tesis->render()}}
            </ul>
            <ul class="pagination visible-xs pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
        </div>
      </div>
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
