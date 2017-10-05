function seleccionar()
  {
    var id=$('#indicadorcap option:selected').val();
    document.getElementById('capturar').value = id;
    
  }

  function seleccion()
  {
    var id=$('#carreracap option:selected').val();
    document.getElementById('capcarrera').value = id;
     // alert(id);
  }