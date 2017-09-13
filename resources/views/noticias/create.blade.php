﻿@extends('layouts.admin')

@section('content')


	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error  }}</li>

				@endforeach

			</ul>


		</div>
	@endif
	
	{!! Form::open(['route' => 'noticias.store' , 'method' =>'POST','files' => true]) !!}
	<div class="row">			
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text"  id="titulo" maxlength="50" onkeyup="cuentatitulo();" name="titulo" required value="{{old('titulo')}}" 
					class="form-control" placeholder="Ingrese el Titulo">
				</div>
				<input type="text" id="mostar_titulo" name="mostar_titulo" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="resumen">Resumen</label>
					<input type="text"  id="resumen" maxlength="70"  name="resumen" required value="{{old('resumen')}}" class="form-control" placeholder="Ingrese el breve resumen">
				</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" placeholder="Ingrese la Descripcion"></textarea>
				
				

				@ckeditor('bodyField', ['height' => 400, 'width'=>1000])
				
				<!-- <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Ingrese la Descripcion"> -->
			</div>
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Indicador</label>
				<select name="nombre" class="form-control selectpicker" data-live-search="true">
					@foreach ($indicador as $i)
						<option value="{{$i->id}}">{{$i->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Categoria</label>
				<select name="origen" class="form-control selectpicker" data-live-search="true">
						<option value="Local">Local</option>
						<option value="Nacional">Internacional</option>
				</select>

			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Imagen</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" id="imagen" name="foto" required value="{{old('foto')}}" class="form-control">
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
			<!-- este toke nos ayudara a trabajr con las trasaciones -->
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
		</div>
	</div>
	
					
					
		{!!Form::close()!!}
	
@push ('scripts')

<!-- <script type="text/javascript">
	function cuenta(){
		var longi=140;
		var resta="";
		var detalles = document.getElementById("detalles").value.length;
		resta=longi-detalles;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_caracter").value=resta;
		if (detalles==140) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
</script>
 -->
<script type="text/javascript">
	function cuentatitulo(){
		var longi=40;
		var resta="";
		var titulo = document.getElementById("titulo").value.length;
		resta=longi-titulo;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_titulo").value=resta;
		if (titulo==40) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
</script>
@endpush
	@endsection