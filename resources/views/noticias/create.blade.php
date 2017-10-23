<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
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
			<input type="text"  id="resumen" maxlength="90"  name="resumen" required value="{{old('resumen')}}" class="form-control" placeholder="Ingrese el breve resumen">
		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<textarea rows="5" id="bodyField" name="descripcion"  class="form-control" placeholder="Ingrese la Descripcion"></textarea>
			@ckeditor('bodyField')
			
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
				<option value="Nacional">Nacional</option>
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
</body>
<script type="text/javascript">
	function ShowSelected()
	{

    // var cod = document.getElementById("indicadorcap").value;
    //  //` alert(cod);

    //  /* Para obtener el texto */
    // var combo = document.getElementById("indicadorcap");
    // var selected = combo.options[combo.selectedIndex].text;
    
    // document.getElementById('capturar').value = cod;
    // /* Para obtener el valor */
    var id=$('#indicadorcap option:selected').val();

    document.getElementById('capturar').value = idd;
    // var id=$('#capturar').val();
    // alert(selected);
    console.log(id);
    // $.ajax({
    //   url:''+ruta,
    //   type:'get',
    // });
}
function cuentatitulo(){
	var longi=50;
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
</script>
</html>