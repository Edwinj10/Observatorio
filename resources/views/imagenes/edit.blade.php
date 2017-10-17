@extends('layouts.admin')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
@include('error.error')
<div class="form-group">
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<b>Se recomienda justificar y dar tamaño uniforme al texto que se ingrese en el campo descripcion</b>
	</div>
</div>
{!!Form::model($i, [ 'method' => 'PATCH', 'route'=> ['portadas.update', $i->id], 'files'=> 'true']) !!}
<div class="row">			
	<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
		<div class="form-group">
			<label for="titulo">Titulo</label>
			<input type="text" name="titulo" required value="{{$i->titulo}}" class="form-control" placeholder="Ingrese el Titulo">
		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<textarea id="bodyField" name="descripcion"  class="form-control" required value="{!!$i->descripcion!!}"></textarea>
			@ckeditor('bodyField')
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="foto">Imagen</label>
			<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
			<input type="file" name="foto"  class="form-control">
			@if(($i->foto)!="")
			<img src="/imagenes/imagenes/{{$i->foto}}" height="200px" width="200px">
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
@endsection