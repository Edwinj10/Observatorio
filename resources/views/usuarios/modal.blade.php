<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$usuario->id}}">
	{{Form::open(array('action'=>array('USController@update', $usuario->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Publicacion</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
		<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
				<div class="form-group">
					<label for="nombre de usuario">Nombre de usuario</label>
					<input type="text" name="name" maxlength="50" required value="{{$usuario->name}}" class="form-control" placeholder="Ingrese el Tipo">
				</div>
				
		</div>
			</div>
			<div class="row">			
		<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
				<div class="form-group">
					<label for="correo">Correo</label>
					<input type="text" name="email" maxlength="50" required value="{{$usuario->email}}" class="form-control" placeholder="Ingrese el Tipo">
				</div>
				
		</div>
			</div>
			<div class="row">			
		<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
				 <div class="form-group">
                            {!!Form::label('','Tipo de Usuario:')!!}

                            <select class="form-control" name="tipo" id="option">
                                <option value="usuario">Usuario</option>
                                <option value="administrador">Administrador</option>
                                <option value="institucion">institución</option>
                            </select>
                         </div>

                         <div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
				<div class="form-group">
					<label for="facebook">Facebook</label>
					<input type="text" name="facebook" maxlength="50" value="{{$usuario->facebook}}" class="form-control" placeholder="Ingrese su cuenta de facebook">
				</div>
				<div class="form-group">
					<label for="twiter">Twiter</label>
					<input type="text" name="twiter" maxlength="50" value="{{$usuario->twiter}}" class="form-control" placeholder="Ingrese su cuenta de twiter">
				</div>
				<div class="form-group">
					<label for="googleplus">Google+</label>
					<input type="text" name="googleplus" maxlength="50" value="{{$usuario->googleplus}}" class="form-control" placeholder="Ingrese su cuenta de Google+">
				</div>
		</div>
				
		</div>
			</div>

				 <div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				                          <div class="form-group">
				                            <label for="foto">Imagen</label>
				                            <!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				                            <input type="file" id="imagen" name="foto" required value="{{old('foto')}}" class="form-control">
				                          </div>
				                          
				                         </div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>


	{{Form::close()}}
</div>