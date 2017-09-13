@extends('layouts.admin')

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
	
	{!! Form::open(['route' => 'tesis.store' , 'method' =>'POST','files' => true]) !!}
	<div class="row">			
			<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Indicador</label>
				<select name="indicador" class="form-control">
					@foreach ($indicador as $i)
						<option value="{{$i->id}}">{{$i->nombre}}</option>
					@endforeach
				</select>

			</div>
			
		</div>

		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label>Carreras</label>
				<select name="carrera" class="form-control">
					@foreach ($carreras as $c)
						<option value="{{$c->id}}">{{$c->carrera}}</option>
					@endforeach
				</select>

			</div>
			
		</div>


		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="tema">Tema</label>
					<input type="text"  id="titulo" maxlength="50" onkeyup="cuentatitulo();" name="tema" required value="{{old('tema')}}" 
					class="form-control" placeholder="Ingrese el Tema">
				</div>
				<input type="text" id="mostar_tema" name="mostar_tema" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
				
		</div>
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="introduccion">Introducción</label>
					<input type="text"  id="introduccion" maxlength="80" onkeyup="cuentatitulo();" name="introduccion" required value="{{old('introduccion')}}" class="form-control" placeholder="Ingrese una breve introducción">
				</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="autor">Autor</label>
					<input type="text"  id="autor" maxlength="80" onkeyup="cuentatitulo();" name="autor" required value="{{old('autor')}}" class="form-control" placeholder="Ingrese el autor">
				</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Imagen</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" id="imagen" name="imagen" required value="{{old('imagen')}}" class="form-control">
			</div>
			
		</div>

			<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Archivo</label>
				<input type="file" id="archivo" name="archivo" required value="{{old('archivo')}}" class="form-control">
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