@extends ('layouts.principal')
@section('title','Instituciones')
<!-- <link rel="stylesheet" href="{{asset('/css/indicadores.css')}}"> -->
@section ('content')
<!-- <link rel="stylesheet" href="{{asset('/css/indicadores.css')}}"> -->

<!-- @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif -->
</head>
<div class="row">
  <div class="col-lg-12">
    @foreach ($institucion as $i)
    <a href="{{ route('institucion.show', $i->id ) }}"><h4 align="center"><b>{{$i->nombres}}</b> </h4></a>
    @endforeach
    <br>
  </div>
  @foreach ($detalle as $d)
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <div class="thumbnail">
      <div class="caption">
        <div class='col-lg-12'>
          <span class="glyphicon glyphicon-credit-card"></span>
        </div>
        <div class='col-lg-12 well well-add-card'>
          <h4 id="nombre">{{$d->nombre}}</h4>
        </div>
        <div class='col-lg-12'>
          <p class="text-muted" id="indi_descripcion">{{$d->descripcion}}</p>
        </div>
        <a href="{{ route('informe.show', $d->id ) }}"><button type="button" class="btn btn-primary">Ver Grafica</button>
        </a>
        <a href="/listado/{{$d->id}}"><button type="button" class="btn btn-primary">Ver Datos en Tablas</button>
        </a>
        <span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
      </div>
    </div>
  </div>
  @endforeach       
</div><!-- End row -->


@stop