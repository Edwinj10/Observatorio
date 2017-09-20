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
    <div class="row">           
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="titulo">Nombre</label>
                    <input type="text"  id="name" name="name" required value="{{old('name')}}" 
                    class="form-control" placeholder="Ingrese el Nombre">
                </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="resumen">Correo</label>
                    <input type="text"  name="email" required value="{{old('email')}}" class="form-control" placeholder="Ingrese el Correo">
                </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Contraseña</label>
                <input type="password"  name="password" id="password1" required value="{{old('password')}}" class="form-control" placeholder="Ingrese la Contraseña">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                
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
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Facebook <b id="campos">*Campo no obligatorios</b></label>
                <input type="text"  name="facebook"  value="{{old('facebook')}}" class="form-control" placeholder="Ingrese el Facebook">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Twitter <b id="campos">*Campo no obligatorios</b></label>
                <input type="text"  name="twiter"  value="{{old('twiter')}}" class="form-control" placeholder="Ingrese el Twitter">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Google + <b id="campos">*Campo no obligatorios</b></label>
                <input type="text"  name="googleplus"  value="{{old('googleplus')}}" class="form-control" placeholder="Ingrese el Google">
            </div>  
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="foto">Foto de Perfil</label>
                <!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
                <input type="file" id="foto" name="foto" required value="{{old('foto')}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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
<script type="text/javascript">
    function validar()
    {
        var carac_valido = " ";
        var carac_longitud = 6;
        var clave1=$('#password1').val();
        var clave2=$('#password2').val();
        console.log(clave1 + clave2)
        if (clave1 == ' '|| clave2 == ' ') {
            alert("Por favor escribir la Contraseña en ambos campos");
            return false;
        }
        if (password1.length < carac_longitud) {
            alert('Las Contraseñas no pueden contener espacios');
            return false;
        }
        else
        {
            if (clave1 != clave2) {
                alert('Las Contraseñas no son iguales');
                return false;
            }
            else
            {
                alert('Contraseña Correctas');
                return true;
            }
        }

    }
</script>
@endpush
    @endsection