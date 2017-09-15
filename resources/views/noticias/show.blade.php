 @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@extends('layouts.principal')
@section('content')

        

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
      <h4 id="titulo" align="center">{{$noticia->titulo}}</h4>
      <a href="/imagenes/noticias/{{$noticia->foto}}" data-lightbox="publicaciones" data-title="{{$noticia->titulo}}">
          <img class="img-thumbnail" src="/imagenes/noticias/{{$noticia->foto}}"  width="500px" height="auto" align="center" alt=""/>
      </a>
      <p>
          {!!$noticia->descripcion!!}
      </p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">           
      <div class="widget-sidebar">
          <h3 class="widget-title"><span id="noticia">Publicaciones Recientes</span></h3>
            <div class="content-widget-sidebar">
              <ul>
                @foreach ($ultimas as $u)
                <li class="recent-post">
                  <div class="post-img">
                    <img src="/imagenes/noticias/{{$u->foto}}" class="img-responsive" alt="{{$u->titulo}}">
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
  <div class="row">
    <div class="col-md-8">
      <h3 class="widget-title"><span id="noticia">Comentar</span></h3>
      <div class="widget-area no-padding blank">
          <div class="status-upload">
            
              <textarea  name="comentario" class="form-control" placeholder="Cual es tu comentario?"  ></textarea>
                <input type="hidden" name="noticia_id" value="">
                  <ul>
                      <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Imagen"><i class="fa fa-picture-o"></i></a></li>
                  </ul>
                  <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Comentar</button>
          </div>
      </div>
    </div>
  </div>

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
@endsection
