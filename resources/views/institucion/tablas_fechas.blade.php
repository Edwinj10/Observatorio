@extends ('layouts.principal')
@section ('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
</head>
<body>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @foreach ($indicador as $i)
      <h4 class="widget-title">Nombre del Indicador: <br> <b>{{$i->nombre}}</b></h4>
      
      <h4 class="widget-title">Indicador de : <a href="{{ route('institucion.show', $i->ind ) }}"><b>{{$i->nombres}}</b></a> </h4>
      @endforeach   
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h4 class="widget-title">Seleccionar Indicador</h4>
      <select name="nombre" class="form-control selectpicker" data-live-search="true" id="indicadorcap" onchange="Capturar();">
        <option value="">Eliga una opcion</option>
        @foreach ($indicador2 as $in)
        <option value="{{$in->id}}"><a href="/listado/{{$in->id}}">{{$in->nombre}}</a></option>
        @endforeach
      </select>           
    </div>
    <div class="col-md-2">
      <h4><b>Click en la Imagen para Buscar Por Meses:</b></h4> 
    </div>
    <div class="col-md-2">
      <input type="hidden" id="datepicker" placeholder="Ingrese la fecha aqui" name="datepicker" readonly="readonly" onchange="redireccion();">
      <input type="hidden" class="form-control" id="capturar" value="{{$i->id}}"> 
    </div>
  </div>
  <div class="panel panel-default panel-table">
    <div class="panel-heading">
      <div class="row">
        <div class="col col-xs-6">
          <h3 class="panel-title"><b>Listado de Cantidades</b></h3>
        </div>
      </div>
      @include('buscador')
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-list table-hover" id="dev-table">
          <thead>
            <tr>
              <th>Cantidad</th>
              <th>Dia</th>
              <th>Mes</th>
              <th>Año</th>
            </tr> 
          </thead>
          <tbody>
            <tr>
             @forelse ($detalle as $det)
             <td>{{ $det->precio}}</td>
             <td>{!! $det->dia!!}</td>
             <td>{{ $det->mes}}</td>
             <td>{{ $det->anio}}</td>
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
          {{$detalle->render()}}
        </ul>
        <ul class="pagination visible-xs pull-right">
          <li><a href="#">«</a></li>
          <li><a href="#">»</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

{!!Html::script('js/tabla.js')!!}
<script type="text/javascript">
  function redireccion()
  {
    var fecha= $('#datepicker').val();
    var month = fecha.substr(0,2);
    // 12
    var year = fecha.substr(3,4);
    // 2017
    var id= $('#capturar').val();
    var capturar = year+ '/'+month+ '/'+id;
    var ruta=  '/listado_fechas/'+capturar;
    window.location.href=ruta;
  }
  function Capturar()
  {
    // declaramos un arreglo y lo recorremos
    var fecha = new Date();
    // var ano = fecha.getMonth();
    var mes = new Array();
    mes[0]= "01";
    mes[1]= "02";
    mes[2]= "03";
    mes[3]= "04";
    mes[4]= "05";
    mes[5]= "06";
    mes[6]= "07";
    mes[7]= "08";
    mes[8]= "09";
    mes[9]= "10";
    mes[10]= "11";
    mes[11]= "12";
    // total es el mes
    // years anio
    var total=mes[fecha.getMonth()];
    var f = new Date();
    var years = f.getFullYear();
    // alert('El año actual es: '+ano);
    var cap=$('#indicadorcap option:selected').val();
    // var fechas= $('#datepicker').val();
    var auxiliar= years+ '/'+total;
    var auxiliar3= auxiliar + '/'+cap;
    var ruta='/listado_fechas/'+ auxiliar3;
    window.location.href=ruta;
  }
  
</script>
</body>
</html>
@stop

