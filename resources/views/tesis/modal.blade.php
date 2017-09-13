<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$t->id}}">
	{{Form::open(array('action'=>array('TesisController@update', $t->id), 'method'=>'put', 'files'=> 'true'))}}	

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					
				</button>
				<h4 class="modal-title">Editar Tesis</h4>
			</div>
			<div class="modal-body">
				{{Form::token()}}
				<div class="row">
							<div class="form-group">
											<label>Indicador</label>
											<select name="indicador" class="form-control">
												@foreach ($indicador as $i)
													<option value="{{$i->id}}">{{$i->nombre}}</option>
												@endforeach
											</select>

							</div>
									
								

								<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
									<div class="form-group">
										<label>Carreras</label>
										<select name="carrera" class="form-control">
											@foreach ($carreras as $c)
												<option value="{{$c->id}}">{{$c->carrera}}</option>
											@endforeach
										</select>

									</div>
									
								</div>
								<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
									<div class="form-group">
										<label for="tema">Tema</label>
										<input type="text"  id="titulo" maxlength="50" onkeyup="cuentatitulo();" name="tema" required value="{{old('tema')}}" 
										class="form-control" placeholder="Ingrese el Tema">
									</div>
									<input type="text" id="mostar_tema" name="mostar_tema" style="border:0px;color:#ff0000;background-color:transparent;font-size:15px;" size="1">
									
							</div>

							<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
								<label for="introduccion">Introducción</label>
								<input type="text"  id="introduccion" maxlength="80" onkeyup="cuentatitulo();" name="introduccion" required value="{{old('introduccion')}}" class="form-control" placeholder="Ingrese una breve introducción">
							</div>
					</div>

					<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
				<div class="form-group">
					<label for="autor">Autor</label>
					<input type="text"  id="autor" maxlength="80" onkeyup="cuentatitulo();" name="autor" required value="{{old('autor')}}" class="form-control" placeholder="Ingrese el autor">
				</div>
						</div>

						<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Imagen</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" id="imagen" name="imagen" required value="{{old('imagen')}}" class="form-control">
			</div>
			
		</div>

			<div class="col-lg-6 col-sm-6 col-m-6 col-xs-12">
			<div class="form-group">
				<label for="foto">Archivo</label>
				<!-- la propiedad required value="{{old('nombre')}}" validara de que si e archivo es muygrande mostrata el texto en la vista pero con la condicio de que no cumple con los caracteres -->
				<input type="file" id="archivo" name="archivo" required value="{{old('archivo')}}" class="form-control">
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