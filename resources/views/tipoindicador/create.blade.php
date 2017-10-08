<html>
<head>
	<meta charset="UTF-8">

</head>
<body>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Tipo</label>
			<input type="text"  id="titulo" name="tipo" required value="{{old('tipo')}}" 
			class="form-control" placeholder="Ingrese el Tipo">
		</div>
		<input type="text" id="mostar_titulo" name="mostar_titulo" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
		
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="foto">Imagen</label>
			<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
			<input type="file" id="imagen" name="imagen" required value="{{old('imagen')}}" class="form-control">
		</div>
	</div>
</body>
</html>