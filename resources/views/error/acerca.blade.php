@extends('layouts.principal')
@section('content')
@section('title','Acerca de Nosotros')
<style>
.team-social li {
	width: 30px;
	height: 30px;
	line-height: 30px;
	text-align: center;
}
.team-social li {
	display: inline-block;
}
style.css:164
.bgblue-dark {
	background-color: #2C3E50;
}

.img-sec, .fig-caption {

	float: left;
	border-radius: 10px;
}/*
.img-sec:hover {
	width: 260px;
	opacity: 2em;
	}*/
	img.img-responsive {
		border-radius: 10px;
	}
	p.marb-20 {
		text-align: justify;
	}

</style>
<h3 class="widget-title"><span id="noticia">Acerca de Nosotros</span></h3>
<div class="row">	
	<div class="col-md-6">	
		<h4 class="widget-title"><b>	Quiénes somos</b></h4>
		<p id="quien">	
			El Observatorio Socioeconómico del Centro de Investigación para la Innovación y el Emprendimiento (CIIEMP) de FAREM-Estelí, es un instrumento de seguimiento y monitorización de los principales indicadores socioeconómicos a nivel Departamental.
		</p>
		<p id="quien">	
			Pretende recopilar y facilitar a empresarios, inversores y población en general, un conjunto de información socioeconómica, confiable y segura a nivel local.
		</p>
		<p id="quien">	
		Esta herramienta permite la publicación de indicadores e informes, determinados en función de las necesidades del usuario, que puedan servir para el conocimiento tanto para inversores locales, nacionales o internacionales.</p>
	</div>
	<div class="col-md-6">	
		<img src="/img/grupoCIIEMP.jpg" alt="CIIEMP" class="img-responsive">
	</div>
</div>
<h3 class="widget-title"><span id="noticia">Desarrolladores de la Página Web</span></h3>
<div class="row">
	<hr>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="col-md-6">
			<div class="team-info">
				<div class="img-sec">
					<img src="/img/edwin.jpg" class="img-responsive">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="fig-caption">
				<h4><b>Edwin Jose Pérez Altamirano</b></h4>
				<p class="marb-20"><b>-Ingeniero en Sistemas de Información Graduado en UNAN-Managua/Farem-Estelí.</b></p>
				<p class="marb-20"><b>-Desarrollador Web.</b></p>
			</div>
			<p>Sígueme :</p>
			<ul class="team-social">
				<li class="blue-dark"><a href="https://www.facebook.com/edwinjaltamirano"><i class="fa fa-facebook" id="red"></i></a></li>
				<li class="blue-light"><a href="https://twitter.com/edwinperez_alta"><i class="fa fa-twitter" id="red"></i></a></li>
				<li class="blue-dark"><a href="https://www.instagram.com/edwinjaltamirano/"><i class="fa fa-instagram" id="red"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="col-md-6">
			<div class="team-info">
				<div class="img-sec">
					<img src="/img/rene.jpg" class="img-responsive">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="fig-caption">
				<h4><b>René Salvador Castillo Martínez</b></h4>
				<p class="marb-20"><b>-Ingeniero en Sistemas de Información Graduado en UNAN-Managua/Farem-Estelí.</b></p>
			</div>
			<p>Sígueme :</p>
			<ul class="team-social">
				<li class="blue-dark"><a href="https://www.facebook.com/convers93?ref=br_rs"><i class="fa fa-facebook" id="red"></i></a></li>
				<!-- <li class="blue-light"><a href="#"><i class="fa fa-twitter" id="red"></i></a></li>
					<li class="blue-dark"><a href="#"><i class="fa fa-instagram" id="red"></i></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="col-md-6">
				<div class="team-info">
					<div class="img-sec">
						<img src="/img/wilmer.jpg" class="img-responsive">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="fig-caption">
					<h4><b>Wilmer Javier Reina Benavídez</b></h4>
					<p class="marb-20"><b>-Ingeniero en Sistemas de Información Graduado en UNAN-Managua/Farem-Estelí.</b></p>
				</div>
				<p>Sígueme :</p>
				<ul class="team-social">
					<li class="blue-dark"><a href="https://www.facebook.com/wilmer.benavidez.7"><i class="fa fa-facebook" id="red"></i></a></li>
				<!-- <li class="blue-light"><a href="#"><i class="fa fa-twitter" id="red"></i></a></li>
					<li class="blue-dark"><a href="#"><i class="fa fa-instagram" id="red"></i></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<br>


	@endsection