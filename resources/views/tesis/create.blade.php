<html>
<head>
	<meta charset="UTF-8">
	
</head>
<body>			
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="tema">Tema</label>
			<input type="text"  id="titulo"  name="tema" required value="{{old('tema')}}" 
			class="form-control" placeholder="Ingrese el Tema">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="introduccion">Introducción</label>
			<input type="text"  id="introduccion"  name="introduccion" required value="{{old('introduccion')}}" class="form-control" placeholder="Ingrese una breve introducción">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Indicador</label>
			<select name="indicador" class="form-control selectpicker" data-live-search="true">
				@foreach ($indicador as $i)
				<option value="{{$i->id}}">{{$i->nombre}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Carreras</label>
			<select name="carrera" class="form-control selectpicker" data-live-search="true">
				@foreach ($carreras as $c)
				<option value="{{$c->id}}">{{$c->carrera}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="autor">Autor</label>
			<input type="text"  id="autor"   name="autor" required value="{{old('autor')}}" class="form-control" placeholder="Ingrese el autor">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="autor">Metodologia</label>
			<input type="text"  id="metodologia"   name="metodologia" required value="{{old('metodologia')}}" class="form-control" placeholder="Ingrese la Metodologia">
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
<script type="text/javascript">
	function cuentatitulo(){
		var longi=100;
		var resta="";
		var titulo = document.getElementById("titulo").value.length;
		resta=longi-titulo;
		if (resta==10) {
			alert("Estas llegando al limite de caracteres");
		}
		document.getElementById("mostar_titulo").value=resta;
		if (titulo==100) {
			alert("Ha llegando al tamaño maximo de caracteres permitidos");
		}
	}
</script>
</body>
</html>