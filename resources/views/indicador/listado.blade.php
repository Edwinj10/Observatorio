@extends ('layouts.principal')
@section ('content')
<br>
<h3 class="widget-title"><span id="noticia">Indicadores</span></h3>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<h3 class="panel-title"><b>Filtrar por tipo de indicador:</b></h3>
			<select name="tipo" class="form-control" onchange="Seleccionar();" id="tipo">
				@foreach ($tipo as $t)
				<option value="{{$t->id}}">{{$t->tipo}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="row">
	@forelse ($indicadores as $i)
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="thumbnail">
			<div class="caption">
				<div class='col-lg-12'>
					<span class="glyphicon glyphicon-credit-card" id="indicador"> Tipo: <b>{{$i->tipo}}</b></span>
				</div>
				<div class='col-lg-12 well well-add-card'>
					<h4 id="nombre">{{$i->nombre}}</h4>
				</div>
				<div class='col-lg-12'>
					<p class="text-muted" id="indi_descripcion">{{$i->descripcion}}</p>
				</div>
				<a href="{{ route('informe.show', $i->id ) }}"><button type="button" class="btn btn-primary">Ver Grafica</button>
				</a>
				<a href="/listado/{{$i->id}}"><button type="button" class="btn btn-primary">Ver Datos en Tablas</button>
				</a>
				<span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
			</div>
		</div>
	</div>
	@empty
	@include('error.alert')
	@endforelse
</div>  
@push ('scripts')
{!!Html::script('/js/tabla.js')!!}
<script type="text/javascript">
	function Seleccionar()
	{
		var id=$('#tipo option:selected').text();

		var ruta='/indicador/tipo/'+ id;

		console.log(id);
		window.location.href=ruta;
	}
</script>
@endpush
@endsection