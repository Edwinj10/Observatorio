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
 {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST', 'files' =>true])!!}
 <div id="message-error" class="alert alert-danger" role='alert' style="display: none;">
    <strong id="error"></strong>
 </div>
 <!-- {!!Form::open(['id'=>'form'])!!} -->
    <div class="row">           
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="titulo">Nombre</label>
                    <input type="text"  id="name" name="name"  value="{{old('name')}}" 
                    class="form-control" placeholder="Ingrese el Nombre">
                </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="resumen">Correo</label>
                    <input type="text"  name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Ingrese el Correo">
                </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Contraseña</label>
                <input type="password"  name="password" id="password1" id="password" value="{{old('password')}}" class="form-control" placeholder="Ingrese la Contraseña">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="tipo">Tipo de Usuario</label>
                    <select class="form-control" name="tipo" id="option">
                        <option value="Usuario">Usuario</option>
                        <option value="Administrador">Administrador</option>
                    </select>
            </div>  
        </div>
        <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Facebook <b id="campos">*Campo no obligatorios</b></label>
                <input type="text"  name="facebook" id="facebook"  value="{{old('facebook')}}" class="form-control" placeholder="Ingrese el Facebook">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Twitter <b id="campos">*Campo no obligatorios</b></label>
                <input type="text"  name="twiter" id="twiter" value="{{old('twiter')}}" class="form-control" placeholder="Ingrese el Twitter">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Google + <b id="campos">*Campo no obligatorios</b></label>
                <input type="text"  name="googleplus" id="googleplus" value="{{old('googleplus')}}" class="form-control" placeholder="Ingrese el Google">
            </div>  
        </div> -->
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="foto">Foto de Perfil</label>
                <!-- la propiedad  value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
                <input type="file" id="foto" name="foto"  value="{{old('foto')}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            <!-- este toke nos ayudara a trabajr con las trasaciones -->
                <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                <!-- {!!link_to('#', 'Guardar', ['id'=> 'Guardar', 'class'=> 'btn btn-primary'])!!} -->
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="button" id="cancelar", name="cancelar">Cancelar</button>
            </div>
            
        </div>
    </div>
    
                    
                    
        {!!Form::close()!!}
    
@push ('scripts')
<script>
    $("#cancelar").click(function(event)
    {
        document.location.href = "{{route('usuarios.index')}}"
    });

    // $("#Guardar").click(function(event)
    // {
    //     var name =$('#name').val();
    //     var email =$('#email').val();
    //     var password =$('#password').val();
    //     var facebook =$('#facebook').val();
    //     var twiter =$('#twiter').val();
    //     var googleplus =$('googleplus').val();
    //     var foto =$('foto').val();
    //     var tipo =$('#tipo option:selected').val();
        
    //     var token =$("input[name=_token]").val();
    //     var route= '{{route('usuarios.store')}}';
    //     // var dataSting = ["name="+ name, "email="+email, "password="+password, "twiter="+ twiter, "googleplus="+googleplus,"foto="+foto, "tipo="+tipo];

    //     $.ajax({
    //         url:route,
    //         headers:{'X-CSRF-TOKEN':token},
    //         type:'post',
    //         datatype: 'json',
    //         data: {name:name, email:email, password:password, facebook:facebook, twiter:twiter, googleplus:googleplus, foto:foto, tipo:tipo},
    //         success:function(data)
    //         {
    //             if (data.success == 'true') 
    //             {
    //                 alert('Guardado');
    //             }
    //         },
    //         error:function(data){
    //         //obtenemos el mensaje de validacion console.log(data.responseJSON.nombre);
    //         $("#message-error").fadeIn();
    //         $("#message-error").show().delay(3000).fadeOut(3);
    //         }
    //     });
    // });
</script>
@endpush
    @endsection