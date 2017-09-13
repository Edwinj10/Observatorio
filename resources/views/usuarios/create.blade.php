@extends('layouts.admin')
  @section('content')
 
  {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST', 'files' =>true])!!}
    
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelregistar">Registrar Nuevo Usuario</div>
                <div class="panel-body">
                    
                        {{ csrf_field() }}
                        <div class="form-group"> 
                            {!!Form::label('nombre','Nombre:')!!}
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!} 
                            
                                @if ($errors->has('name'))

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                         </div> 
                        <div class="form-group"> 
                             {!!Form::label('email','Correo:')!!} 
                             {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif 
                        </div> 
                        <div class="form-group"> 
                             {!!Form::label('password','Contraseña:')!!} 
                             {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!} 
                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                         </div>

                         <div class="form-group">
                            {!!Form::label('','Tipo de Usuario:')!!}

                            <select class="form-control" name="tipo" id="option">
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                                <option value="institución">institución</option>
                            </select>
                         </div>
                           <div class="form-group"> 
                             {!!Form::label('facebook','Facebook (Opcional)')!!} 
                             {!!Form::text('facebook',null,['class'=>'form-control','placeholder'=>'ingrese su cuenta de facebook'])!!} 
                              @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                         </div>
                         <div class="form-group"> 
                             {!!Form::label('twiter','Twiter (Opcional)')!!} 
                             {!!Form::text('twiter',null,['class'=>'form-control','placeholder'=>'ingrese su cuenta de twiter'])!!} 
                              @if ($errors->has('twiter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twiter') }}</strong>
                                    </span>
                                @endif
                         </div>
                           <div class="form-group"> 
                               {!!Form::label('googleplus','google+ (Opcional)')!!} 
                               {!!Form::text('googleplus',null,['class'=>'form-control','placeholder'=>'ingrese su cuenta de google+'])!!} 
                                @if ($errors->has('googleplus'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('googleplus') }}</strong>
                                      </span>
                                  @endif
                           </div>

                         <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
                          <div class="form-group">
                            <label for="foto">Imagen</label>
                            <!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
                            <input type="file" id="imagen" name="foto" required value="{{old('foto')}}" class="form-control">
                          </div>
                          
                         </div>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                         </div>
                                           
                   
                </div>

            </div>
        </div>
    </div>
</div>




     

  {!!Form::close()!!}
  @endsection