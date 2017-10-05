<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$usuario->id}}">
	{{Form::open(array('action'=>array('USController@update', $usuario->id), 'method'=>'put', 'files'=> 'true'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Usuario</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">			
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" name="name" maxlength="50" required value="{{$usuario->name}}" class="form-control" placeholder="Ingrese el Nombre">
						</div>

					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Correo</label>
							<input type="text" name="email" maxlength="90" required value="{{$usuario->email}}" class="form-control" placeholder="Ingrese el Correo">
						</div>

					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label>Tipo de Usuario</label>
							<select name="tipo" class="form-control">
								@if ($usuario->tipo=='Usuario')
								<option value="{{$usuario->tipo}}" selected="">Usuario</option>
								<option value="Administrador">Administrador</option>
								@else
								<option value="Administrador" selected="">Administrador</option>
								<option value="Usuario">Usuario</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Facebook</label>
							<input type="text" name="facebook" maxlength="100" required value="{{$usuario->facebook}}" class="form-control" placeholder="Ingrese el Facebook">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Google +</label>
							<input type="text" name="googleplus" maxlength="100" required value="{{$usuario->googleplus}}" class="form-control" placeholder="Ingrese el Correo">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
						<div class="form-group">
							<label for="titulo">Twitter</label>
							<input type="text" name="twiter" maxlength="100" required value="{{$usuario->twiter}}" class="form-control" placeholder="Ingrese el Correo">
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-m-12 col-xs-12">
						<div class="form-group">
							<label for="foto">Foto de perfil</label>
							<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
							<input type="file" name="foto"  class="form-control">
							@if(($usuario->foto)!="")
							<img src="/imagenes/usuarios/{{$usuario->foto}}" height="150px" width="150px" class="img-circle">
							@endif
						</div>
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