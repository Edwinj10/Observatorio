<html>
<head>
	<meta charset="UTF-8">
	
</head>
<body>			
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="titulo">Nombre</label>
			<input type="text"  id="nombres" name="nombres" required value="{{old('nombres')}}" 
			class="form-control" placeholder="Ingrese el Nombre">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="resumen">Direccion</label>
			<input type="text"  name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Ingrese la Direccion">
		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Mision</label>
			<input type="text"  name="mision" required value="{{old('mision')}}" class="form-control" placeholder="Ingrese la Mision">
		</div>	
	</div>
	<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Vision</label>
			<input type="text"  name="vision" required value="{{old('vision')}}" class="form-control" placeholder="Ingrese la Vision">
		</div>	
	</div>
	<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
		<div class="form-group">
			<label for="foto">Logo</label>
			<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
			<input type="file" id="logo" name="logo" required value="{{old('logo')}}" class="form-control">
		</div>
	</div>
</body>
</html>