@extends('layouts.principal')
@section('content')
<link rel="stylesheet" href="{{asset('/css/perfil.css')}}">
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="media">
					<div align="center">
						@foreach($perfil as $p)
						
						<div class="file" id="file">
							@if(empty($p->foto))
							<img class="thumbnail img-responsive" src="/img/usuario.png" width="300px" height="300px" id="perfil">
							@else
							<img class="thumbnail img-responsive" src="{{asset('/imagenes/usuarios/'.$p->foto)}}" width="300px" height="300px" id="perfil">
							@endif
							{{Form::open(array('action'=>array('USController@foto', $p->id), 'method'=>'put', 'files'=> 'true'))}}
							<p id="imagen">Modificar Imagen</p>
							<input type="file" id="addfotoarea" name="foto">
							<output id="list"></output>
						</div>
						<br>
						<button class="btn btn-primary" type="submit" id="modificar" disabled="">Modificar</button>
						{{Form::close()}}
						<br>
						@endforeach
					</div>
					<div class="media-body">
						<hr>
						<h4 class="widget-title"><strong>Nombre</strong>
						</h4>
						<p>{{$p->name}}</p>
						<hr>
						<h4 class="widget-title"><strong>Correo</strong>
						</h4>
						<p>{{$p->email}}</p>
						<hr>
						<h4 class="widget-title"><strong>Fecha de Registro</strong>
						</h4>
						<p>
							{{$user->created_at->diffForHumans()}}
						</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<h3 class="widget-title"><span id="noticia">Perfil</span></h3>
		@include('error.mensaje')
		@include('error.error')
		<hr>
		<!-- Sample post content with picture. -->
		<h5><b>Listado de Comentarios realizados</b></h5>
		@forelse($comentario as $c)
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="pull-left">
					<a href="#">
						@if(empty($c->foto))
						<img class="media-object img-circle" src="/img/usuario.png" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
						@else
						<img class="media-object img-circle" src="{{asset('/imagenes/usuarios/'.$c->foto)}}" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
						@endif
					</a>
				</div>
				<h4><a href="#" style="text-decoration:none;"><strong>{{$c->name}}</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i>{{$c->fecha}}</i></a></small></small></h4>
				<span>
					<div class="navbar-right">
						<div class="dropdown">
							<button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<i class="fa fa-cog" aria-hidden="true"></i>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
								<li><a href="#" data-target="#modal-edit-{{$c->id}}" data-toggle="modal"><i class="fa fa-fw fa-exclamation-triangle"></i>Editar</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#" data-target="#modal-eliminar-{{$c->id}}" data-toggle="modal"><i class="fa fa-fw fa-trash"></i> Eliminar</a></li>
								@include('perfil.eliminar')
								@include('perfil.modificar')

							</ul>
						</div>
					</div>
				</span>
				<hr>
				<div class="post-content">

					<p>Comentario realizado: <b>{{$c->comentario}}</b></p>
					<p>Estado del Comentario: <b>{{$c->estado}}</b></p>
					<h4>Noticia: </h4>
					<a href="{{ route('noticias.show', $c->idd ) }}">
						<img class="img-responsive" src="/imagenes/noticias/{{$c->fotos}}" width="300px" height="300px">
					</a>
					<br>
					<a href="{{ route('noticias.show', $c->idd ) }}">
						<h4>Titulo de la noticia: {{$c->titulo}}</h4>
					</a>
					<!-- <p><br><a href="/tags/christmas" class="tag">#Christmas</a> <a href="/tags/caturday" class="tag">#Caturday</a></p> -->

				</div>
				<hr>
<!-- 					<div>
						<div class="pull-right btn-group-xs">
							<a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Like</a>
							<a class="btn btn-default btn-xs"><i class="fa fa-retweet" aria-hidden="true"></i> Reshare</a>
							<a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Comment</a>
						</div>
						<div class="pull-left">
							<p class="text-muted" style="margin-left:5px;"><i class="fa fa-globe" aria-hidden="true"></i> Public <strong>via mobile</strong></p>
						</div>
						<br>
					</div> -->
					<!-- <hr>
					<div class="media">
						<div class="pull-left">
							<a href="#">
								<img class="media-object img-circle" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
							</a>
						</div>
						<div class="media-body">
							<textarea class="form-control" rows="1" placeholder="Comment"></textarea>
						</div>
					</div> -->
				</div>
			</div>
			
			@empty
			@include('error.alert')
			@endforelse
			<!-- Sample post content with comments. -->

		</div>
	</div>
</div>
@push ('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#addfotoarea').click(function(){
			// $("#modificar").attr('disabled', false);
			redireccion();

		});
	});
</script>
<script>
	function redireccion()
	{
		var foto=$('foto').val();
		console.log(foto);
		if (foto!= "")
		{

			$("#modificar").attr('disabled', false);

		}
		else
		{
			$("#modificar").attr('disabled', true);
		}
	}
</script>
@endpush
@endsection