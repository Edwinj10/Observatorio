@extends ('layouts.principal')
@section ('content')
<link rel="stylesheet" href="{{asset('/css/listar.css')}}">

  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

 <!-- <link rel="stylesheet" href="{{asset('/css/indicadores.css')}}"> -->
 
</head>
  <div class="row">
    <section class="new-deal">
      <h3 class="widget-title"><span id="noticia">Instutuciones Afiliadas</span></h3>
     <div class="container">
      @foreach ($instituciones as $s)
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 deal deal-block">
        <div class="item-slide">
          <div class="box-img">
            <img src="{{asset('imagenes/instituciones/'.$s->logo)}}" alt="{{$s->nombres}}"/>
              <div class="text-wrap">
              <h4>{{$s->nombres}}</h4>
              </div>
          </div>
          <div class="slide-hover">
            <div class="text-wrap">
              <p>Direccion: {{$s->direccion}}</p>
                <div class="desc">                  
                </div>
                <div class="book-now-c">
                  <a href="/institucion/{{$s->id}}">Ver</a>
                    
                </div>
            </div>
          </div>
        </div>
     </div>
      @endforeach
     </div>
    </section>
  </div> 
@stop