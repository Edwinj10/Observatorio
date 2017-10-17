@extends('layouts.principal')
@section('content')
{!!Html::style('/css/comentario.css')!!}
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10&appId=1515275818535109";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="row"> 
  <div class="col-md-12"> 
    @foreach ($user as $use)
    <i class="fa fa-user " id="user"></i>Por: {{$use->name}} 
    @endforeach
  </div>
  <div class="col-md-12"> 
    <i class="fa fa-calendar" aria-hidden="true" id="cale"></i>Publicado:  {{$imagen->created_at->diffForHumans()}}
  </div>
  <div class="col-md-12">
    <i class="fa fa-eye" id="ver" aria-hidden="true"></i>Visto Por: {{$imagen->total_visitas}}
  </div>
</div>
<div class="row">          
  <div class="col-lg-8 col-md-8 col-sm-8">
    <h4 id="titulo" align="center"><b>{{$imagen->titulo}}</b></h4>
    <a href="/imagenes/imagenes/{{$imagen->foto}}" data-lightbox="publicaciones" data-title="{{$imagen->titulo}}">
      <img class="img-thumbnail" src="/imagenes/imagenes/{{$imagen->foto}}"  width="100%" height="auto" align="center" alt=""/>
    </a>
    <br><br>
    <p>
      {!!$imagen->descripcion!!}
    </p>
    <div class="fb-share-button"  data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fobservatorio-edwinjaltamirano.c9users.io%2F&amp;src=sdkpreparse">Compartir</a></div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">           
    <div class="widget-sidebar">
      <h3 class="widget-title"><span id="noticia">Publicaciones Recientes</span></h3>
      <div class="content-widget-sidebar">
        <ul>
          @foreach ($noticias as $n)
          <li class="recent-post">
            <div class="post-img">
              <a href="{{ route('noticias.show', $n->id ) }}">
                <img src="/imagenes/noticias/{{$n->foto}}" class="img-responsive" alt="{{$n->titulo}}">
              </a>
            </div>
            <a href="{{ route('noticias.show', $n->id ) }}"><h5 id="titulo">{{$n->titulo}}</h5></a>
            <p id="fecha" align="center"><small><i class="fa fa-calendar" data-original-title="" title=""></i> {{$n->created_at->diffForHumans()}}</small></p>
          </li>
          <hr>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
<br>
@push ('scripts')

<script type="text/javascript">
  function redireccion()
  {

   var URLactual = window.location.href;


 }
</script>
<script type="text/javascript" src="{{asset('/js/comentarios.js')}}"></script>
@endpush

@endsection
