<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Nombre</label>
			<input type="text"  name="nombre" required value="{{old('nombre')}}" 
			class="form-control" placeholder="Ingrese el Nombre">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Descripcion</label>
			<input type="text"  name="descripcion" required value="{{old('descripcion')}}" 
			class="form-control" placeholder="Ingrese la Descripcion">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Institucion</label>
			<select name="institucion_id" class="form-control selectpicker" data-live-search="true">
				@foreach ($ins as $i)
				<option value="{{$i->id}}">{{$i->nombres}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Tipo de Indicador</label>
			<select name="tipo" class="form-control selectpicker" data-live-search="true">
				@foreach ($tipo as $t)
				<option value="{{$t->id}}">{{$t->tipo}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label>Importante</label>
			<select name="importante" class="form-control selectpicker" data-live-search="true">
				<option value="0">No</option>
				<option value="1">Si</option>
			</select>
		</div>
	</div>
</div>
{!!Form::close()!!}

<script type="text/javascript">
	function valida(e){
		tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
</body>
</html>