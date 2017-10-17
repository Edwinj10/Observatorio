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
    @foreach ($users as $u)
    <i class="fa fa-user " id="user"></i>Por: {{$u->name}} 
    @endforeach
  </div>
  <div class="col-md-12"> 
    <i class="fa fa-calendar" aria-hidden="true" id="cale"></i>Publicado:  {{$noticia->fecha}}
  </div>
  <div class="col-md-12">
    <i class="fa fa-eye" id="ver" aria-hidden="true"></i>Visto Por: {{$noticia->total_visitas}}
  </div>
</div>
<div class="row">          
  <div class="col-lg-8 col-md-8 col-sm-8">
    <h4 id="titulo" align="center"><b>{{$noticia->titulo}}</b></h4>
    <a href="/imagenes/noticias/{{$noticia->foto}}" data-lightbox="publicaciones" data-title="{{$noticia->titulo}}">
      <img class="img-thumbnail" src="/imagenes/noticias/{{$noticia->foto}}"  width="500px" height="auto" align="center" alt=""/>
    </a>
    <br><br>
    <p>
      {!!$noticia->descripcion!!}
    </p>
    <div class="fb-share-button"  data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fobservatorio-edwinjaltamirano.c9users.io%2F&amp;src=sdkpreparse">Compartir</a></div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">           
    <div class="widget-sidebar">
      <h3 class="widget-title"><span id="noticia">Publicaciones Recientes</span></h3>
      <div class="content-widget-sidebar">
        <ul>
          @foreach ($ultimas as $u)
          <li class="recent-post">
            <div class="post-img">
              <a href="{{ route('noticias.show', $u->id ) }}">
                <img src="/imagenes/noticias/{{$u->foto}}" class="img-responsive" alt="{{$u->titulo}}">
              </a>
            </div>
            <a href="{{ route('noticias.show', $u->id ) }}"><h5 id="titulo">{{$u->titulo}}</h5></a>
            <p id="fecha" align="center"><small><i class="fa fa-calendar" data-original-title="" title=""></i> {{$u->created_at->diffForHumans()}}</small></p>
          </li>
          <hr>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-8">
    @if (Auth::guest())
    <h4>Para realizar algun comentario debes Registrarte O Iniciar Session</h4>
    
    <a href="{{ route('register') }}"  class="nav-link"><button class="btn btn-success" id="comentar">Registrame</button></a>
    <a href="{{ route('login') }}"  class="nav-link"><button class="btn btn-success" id="comentar">Iniciar Sesion</button></a>
    
    @else
    <div class="col-md-8">
      <div class="widget-area no-padding blank">
        <div class="status-upload">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
          <!-- <input type="hidden" id="id"> -->
          {!! Form::open(['route' => 'comentarios.store' , 'method' =>'POST','files' => true]) !!}
          <textarea  name="comentario" class="form-control" placeholder="Cual es tu comentario?" id="comentario" ></textarea>
          <input type="hidden" name="noticia_id" value="{{$noticia->id}}">
          <!-- <ul>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
            <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
          </ul> -->
          <button type="submit" class="btn btn-success" id="comentar"><i class="fa fa-share" id="comen"></i> Comentar</button>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@include('error.mensaje')
@include('error.error')
<!-- lista -->
<section class="row-section">
  <h3 class="widget-title"><span id="noticia">Comentarios</span></h3>
  <div class="container">
    <div class="col-md-8 row-block">
      <ul id="sortable">
        @forelse ($comentario as $co)
        <li>
          <div class="media">
            <div class="media-left align-self-center">
              <img class="rounded-circle" id="avatar" src="{{asset('/imagenes/usuarios/'.$co->foto)}}">
            </div>
            <div class="media-body">
              <h4>{{$co->name}}</h4>
              <h4 id="fecha">Fecha: {{$co->fecha}} </h4>
              <p>{{$co->comentario}}</p>
            </div>
          </div>
          @empty
          @include('error.alert')
          @endforelse
        </li>
      </ul>
    </div>

  </div>
</section>
<!-- sugerencias -->

<div class="col-lg-12 col-md-12">
  <div class="section" id="noticias">
    <h3 class="widget-title"><span id="noticia">Noticias Relacionadas</span></h3>
    <div class="row">
      @foreach ($sugerencias as $s)
      <div class="col-md-4  col-lg-4 col-xs-12">
        <div class="column"> 
          <!-- Post-->
          <div class="post-module"> 
            <!-- Thumbnail-->
            <div class="thumbnail">
             <!--  <div class="date"> <a href="#0">
                <div class="day"><i class="fa fa-bars" aria-hidden="true"></i></div>
              </a> </div> -->
              <img src="/imagenes/noticias/{{ $s->foto }}" class="img-responsive" alt=""> </div>
              <!-- Post Content-->
              <div class="post-content">
                <div class="category">Economicas</div>
                <h2 class=" title"><a href="{{ route('noticias.show', $s->id ) }}">{{$s->titulo}}</a></h2>
                <p class="description">{{ $s->resumen }}</p>
                <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> {{ $s->created_at }}</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 0 comments</a></span></div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
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
