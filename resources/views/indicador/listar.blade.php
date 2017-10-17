@extends ('layouts.principal')
@section ('content')
<link rel="stylesheet" href="{{asset('/css/listar.css')}}">
</head>
<h3 class="widget-title"><span id="noticia">Indicadores por Instituciones de tipo @foreach ($capturar as $c) <b>{{$c->tipo}}</b>@endforeach</span></h3>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <h4><b>Filtrar por tipo de indicador:</b></h4>
      <select name="tipo" class="form-control selectpicker" data-live-search="true" onchange="Seleccionar();" id="tipo">
        @foreach ($filtro as $f)
        <option value="{{$f->id}}">{{$f->tipo}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <h4><b>Filtrar tipos de indicadores por Instituciones:</b></h4>
      <select name="captura" class="form-control selectpicker" data-live-search="true" onchange="Capturar();" id="captura">
        @foreach ($tipo as $t)
        <option value="{{$t->id}}">{{$t->tipo}}</option>
        @endforeach
      </select>
    </div>
  </div>

</div>
<div class="row">
  <section class="new-deal">
   <div class="container">
    @foreach ($social as $s)
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 deal deal-block">
      <div class="item-slide">
        <div class="box-img">
          <img src="{{asset('imagenes/instituciones/'.$s->logo)}}" alt="{{$s->nombres}}"/>
          <div class="text-wrap">
            <h4>{{$s->nombres}}</h4>
            <div class="desc">                  
              <span>Total Indicadores</span>
              <h3>{{$s->indicador_count}}</h3>
            </div>
            <div class="book-now-c">                
              <a href="instituciones/{id1}/{id2}">Ver</a>
            </div>
          </div>
        </div>
        <div class="slide-hover">
          <div class="text-wrap">
            <p>Direccion: {{$s->direccion}}</p>

            <div class="desc">                  
              <span>Total Indicadores</span>
              <h3>{{$s->indicador_count}}</h3>
            </div>
            <div class="book-now-c">
              <a href="/instituciones/{{$s->institucion_id}}/{{$s->indicador_id}}">Ver</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>
</div>
<script type="text/javascript">
  function Seleccionar()
  {
    var id=$('#tipo option:selected').text();

    var ruta='/indicador/tipo/'+ id;

    // console.log(id);
    window.location.href=ruta;
  }
  function Capturar()
  {
    var cap=$('#captura option:selected').val();
    var rutas='/indicadores/' + cap;
    window.location.href=rutas;

  }
</script>
@stop