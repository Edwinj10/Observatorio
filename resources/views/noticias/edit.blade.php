@extends('layouts.admin')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
@include('error.error')
{!!Form::model($n, [ 'method' => 'PATCH', 'route'=> ['noticias.update', $n->id], 'files'=> 'true']) !!}
<div class="row">
	<div class="form-group">
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Se recomienda poner un tamaño de letra de 16 y justificar  el texto agregado en la descripcion antes de proceder a guardar. Todo esto con el objetivo de mantener uniformidad en el texto.
		</div>
	</div>			
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Titulo</label>
			<input type="text" name="titulo" id="titulo" onkeyup="cuentatitulo();" required value="{{$n->titulo}}" class="form-control" placeholder="Ingrese el Titulo">
		</div>
		<input type="text" id="mostar_titulo" name="mostar_titulo" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Resumen</label>
			<input type="text" name="resumen" id="resumen" onkeyup="cuentaresumen();" required value="{{$n->resumen}}" class="form-control" placeholder="Ingrese el Titulo">
		</div>
		<input type="text" id="mostar_resumen"  name="mostar_resumen" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
	</div>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" required value="{!!$n->descripcion!!}"></textarea>
			@ckeditor('bodyField')
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
		<div class="form-group">
			<label>Categoria</label>
			<select name="nombre" class="form-control selectpicker" data-live-search="true">
				@foreach ($indicador as $i)
				@if($i->id==$n->indicador_id)
				<option value="{{$i->id}}" selected>{{$i->nombre}}</option>
				@else
				<option value="{{$i->id}}">{{$i->nombre}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
		<div class="form-group">
			<label>Categoria</label>
			<select name="origen" class="form-control selectpicker" data-live-search="true">
				@if ($n->origen=='Local')
				<option value="{{$n->origen}}" selected="">Local</option>
				<option value="Nacional">Nacional</option>
				@else
				<option value="Nacional" selected="">Nacional</option>
				<option value="Local">Local</option>
				@endif
			</select>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-m-4 col-xs-12">
		<div class="form-group">
			<label for="foto">Imagen</label>
			<input type="file" name="foto"  class="form-control">
			@if(($n->foto)!="")
			<img src="/imagenes/noticias/{{$n->foto}}" height="200px" width="200px">
			@endif
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<!-- este toke nos ayudara a trabajr con las trasaciones -->
			<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="noticias/"><button class="btn btn-danger">Cancelar</button></a>
		</div>
		
	</div>
</div>
{!!Form::close()!!}
@push ('scripts')
<script type="text/javascript">
	function cuentatitulo(){
		var longi=150;
		var resta="";
		var titulo = document.getElementById("titulo").value.length;
		resta=longi-titulo;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_titulo").value=resta;
		if (resta==0) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
	function cuentaresumen(){
		var longi=100;
		var resta="";
		var resumen = document.getElementById("resumen").value.length;
		resta=longi-resumen;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_resumen").value=resta;
		if (resta==0) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
</script>
@endpush
@endsection