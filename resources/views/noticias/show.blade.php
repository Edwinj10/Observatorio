 @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
<style type="text/css">
  /*inicio*/


.widget-area.blank {
background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
-webkit-box-shadow: none;
-moz-box-shadow: none;
-ms-box-shadow: none;
-o-box-shadow: none;
box-shadow: none;
}

.widget-area {
background-color: #ccc;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
-webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
float: left;
margin-top: 30px;
/*padding: 25px 30px;*/
position: relative;
width: 100%;
}
.status-upload {
background: none repeat scroll 0 0 #f5f5f5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
float: left;
width: 100%;
}
.status-upload form {
float: left;
width: 100%;
}
.status-upload form textarea {
background: none repeat scroll 0 0 #fff;
border: medium none;
-webkit-border-radius: 4px 4px 0 0;
-moz-border-radius: 4px 4px 0 0;
-ms-border-radius: 4px 4px 0 0;
-o-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;
color: #777777;
float: left;
font-family: Lato;
font-size: 14px;
height: 142px;
letter-spacing: 0.3px;
padding: 20px;
width: 100%;
resize:vertical;
outline:none;
border: 1px solid #F2F2F2;
}

.status-upload ul {
float: left;
list-style: none outside none;
margin: 0;
padding: 0 0 0 15px;
width: auto;
}
.status-upload ul > li {
float: left;
}
.status-upload ul > li > a {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #777777;
float: left;
font-size: 14px;
height: 30px;
line-height: 30px;
margin: 10px 0 10px 10px;
text-align: center;
-webkit-transition: all 0.4s ease 0s;
-moz-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
width: 30px;
cursor: pointer;
}
.status-upload ul > li > a:hover {
background: none repeat scroll 0 0 #606060;
color: #fff;
}
.status-upload form button {
border: medium none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #fff;
float: right;
font-family: Lato;
font-size: 14px;
letter-spacing: 0.3px;
margin-right: 9px;
margin-top: 9px;
padding: 6px 15px;
}
.dropdown > a > span.green:before {
border-left-color: #2dcb73;
}
.status-upload form button > i {
margin-right: 7px;
}
/*ejemplo*/


/*fin comentarios*/
 @import url('https://fonts.googleapis.com/css?family=Kumar+One');
@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.row-section{float:left; width:100%; background: #42275a;  /* fallback for old browsers */

background: linear-gradient(to bottom, #003457, #1a5d8a);
}
.row-section h2{float:left; width:100%; color:#fff; margin-bottom:30px; font-size: 14px;}
.row-section h2 span{font-family: 'Kumar One', cursive; display:block; font-size:20px;}
.row-section h2 a{color:#d2abce;}
.row-section .row-block{background:#fff; padding:20px; margin-bottom:50px;}
.row-section .row-block ul{margin:0; padding:0;}
.row-section .row-block ul li{list-style:none; margin-bottom:20px;}
.row-section .row-block ul li:last-child{margin-bottom:0;}
.row-section .row-block ul li:hover{cursor:grabbing;}
.row-section .row-block .media{border:1px solid #d5dbdd; padding:5px 20px; border-radius: 5px; box-shadow:0px 2px 1px rgba(0,0,0,0.04); background:#fff;}
.row-section .media .media-left img{width:75px;}
.row-section .media .media-body p{padding: 0 15px; font-size:14px;}
.row-section .media .media-body h4 {color: #6b456a; font-size: 18px; font-weight: 600; margin-bottom: 0; padding-left: 14px; margin-top:12px;}
.btn-default{background:#6B456A; color:#fff; border-radius:30px; border:none; font-size:16px;}
h4#fecha {color: black; font-size: 14px; font-weight: 600;  padding-left: 14px; margin-top:12px;}

</style>
@extends('layouts.principal')


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10&appId=1515275818535109";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
  <br>
  <!-- lista -->
  <section class="row-section">
    <h3 class="widget-title"><span id="noticia">Comentarios</span></h3>
    <div class="container">
      <div class="col-md-8 row-block">
        <ul id="sortable">
            @foreach ($comentario as $co)
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
                @endforeach
          </li>
        </ul>
      </div>
    </div>
  </section>
  <div class="row">
    <div class="col-md-8">
      <div class="col-md-8">
                  <div class="widget-area no-padding blank">
                    <div class="status-upload">
                      <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
                      <input type="hidden" id="id">
                            {!!Form::open(['id'=>'form'])!!}
                              <textarea  name="comentario" class="form-control" placeholder="Cual es tu comentario?" id="comentario" ></textarea>
                              <input type="hidden" name="noticia_id" value="{{$noticia->id}}">
                              <ul>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                              </ul>
                              {!!link_to('#',$title ='Guardar',$attributes= ['id'=>'guardarComentario','class'=>'btn btn-info btn-sm'],$secure = null)!!}
                            {!!Form::close()!!}
                            
                    </div>
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
