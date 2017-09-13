@extends ('layouts.principal')
<link rel="stylesheet" href="{{asset('/css/listar.css')}}">
@section ('content')

  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

 <!-- <link rel="stylesheet" href="{{asset('/css/indicadores.css')}}"> -->
 
 </head>
      <div class="row">
      @foreach ($tipo as $t)

      <h4 align="center">Lista de Instituciones Que Manejan Indicadores {{$t->tipo}} </h4>
      @endforeach
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
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 deal deal-block">
        <div class="item-slide">
            <div class="box-img">
            <img src="/imagenes/instituciones/gobierno-de-Nicaragua-DGI-750x500.jpg" alt="{{$s->nombres}}"/>
              <div class="text-wrap">
              <h4>Camara</h4>
                <div class="desc">                  
                  <span>Total Indicadores</span>
                  <h3>2</h3>
                </div>
                <div class="book-now-c">                
                <a href="">Ver</a>
                </div>
              </div>
            </div>
            <div class="slide-hover">
            <div class="text-wrap">
            <p>Direccion: </p>
            
                <div class="desc">                  
                  <span>Total Indicadores</span>
                  <h3>sd</h3>
                </div>
                <div class="book-now-c">
                  <a href="/imagenes/instituciones/gobierno-de-Nicaragua-DGI-750x500.jp">Ver</a>
                  
                </div>
              </div>
            </div>
        </div>
      </div>

      
    
      </div>
     </div>
     </section>
      </div>

      

    
    
    
     
@stop