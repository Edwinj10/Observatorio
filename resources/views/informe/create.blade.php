<html>
    <head>
        <meta charset="utf-8">
        </meta>
    </head>
    <body>
        <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
            <div class="form-group">
                <label>
                </label>
                <select class="form-control" data-live-search="true" name="indicador_id">
                    @foreach ($tipo as $t)
                    <option value="{{$t->id}}">
                        {{$t->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
            <div class="form-group">
                <label for="titulo">
                    Precio
                </label>
                <input class="form-control" name="precio" onkeypress="return validar(event)" placeholder="Ingrese el Precio" required="" type="text" value="{{old('precio')}}">
                </input>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
            <div class="form-group">
                <label for="titulo">
                    Descripcion
                </label>
                <input class="form-control" name="descripcion" placeholder="Ingrese la Descricion" required="" type="text" value="{{old('descripcion')}}">
                </input>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    function validar(e){
		tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9.]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
