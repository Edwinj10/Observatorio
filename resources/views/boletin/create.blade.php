<html>
<head>
	<meta charset="UTF-8">

</head>
<body>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Url</label>
			<input type="text"  name="url" required value="{{old('url')}}" 
			class="form-control" placeholder="Ingrese la URL">
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
			<label for="foto">Imagen de Portada</label>
			<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
			<input type="file" id="portada" name="portada" required value="{{old('portada')}}" class="form-control">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="foto">Archivo PDF</label>
			<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
			<input type="file" id="archivo" name="archivo" required value="{{old('archivo')}}" class="form-control">
		</div>
	</div>

</body>
</html>

