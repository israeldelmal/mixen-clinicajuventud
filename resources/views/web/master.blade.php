<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="#">
	<meta name="author" content="Mixen: Boosting Brands">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/icons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
	<!-- Navegación -->
	<nav>
		<section>
			<div>
				<a @if(Route::is('/')) class="item-nav" href="#inicio" @else href="{{ url('/') }}" @endif>
					<img src="{{ asset('assets/images/isologo.png') }}" alt="Isologo de Clínica Juventud">
				</a>
				<div>
					<a href="#">Consulta tus resultados</a>
					<div>
						<span><i class="fas fa-phone-volume"></i> Llámanos</span>
						<a href="tel:6144253860">(614) 4 25 38 60</a>
						<a href="tel:6144252539">(614) 4 25 25 39</a>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div>
				<ul>
					<li><a @if(Route::is('/')) class="item-nav" href="#inicio" @else href="{{ url('/') }}#inicio" @endif>Nosotros</a></li>
					<li><a @if(Route::is('/')) class="item-nav" href="#servicios" @else href="{{ url('/') }}#servicios" @endif>Servicios</a></li>
					<li><a @if(Route::is('/')) class="item-nav" href="#paquetes" @else href="{{ url('/') }}#paquetes" @endif>Paquetes</a></li>
					<li><a @if(Route::is('/')) class="item-nav" href="#noticias" @else href="{{ url('/') }}#noticias" @endif>Noticias</a></li>
					<li><a @if(Route::is('/')) class="item-nav" href="#contacto" @else href="{{ url('/') }}#contacto" @endif>Contacto</a></li>
				</ul>
				<a href="https://www.facebook.com/ClinicaJuventudcuu/" target="_blank">
					<i class="fab fa-facebook-f"></i>
				</a>
				<form action="#" method="POST" id="SearchForm">
					<input type="search" name="search" id="search" placeholder="Buscar...">
					<button><i class="fas fa-search"></i></button>
				</form>
			</div>
		</section>
	</nav>
	@yield('content')
	<!-- Pie -->
	<footer>
		<section>
			<div>
				<img src="{{ asset('assets/images/isologo-2.png') }}" alt="Isologo #2 de Clínica Juventud">
			</div>
			<div>
				<ul>
					<span>Horario</span>
					<li>
						<i class="fas fa-chevron-right"></i>
						<span>Lunes a Sábado</span>
						<span>7:00 - 21:00</span>
					</li>
					<li>
						<i class="fas fa-chevron-right"></i>
						<span>Domingo</span>
						<span>Cerrado</span>
					</li>
				</ul>
				<ul>
					<span>Servicios</span>
					<li><i class="fas fa-chevron-right"></i> Laboratorio</li>
					<li><i class="fas fa-chevron-right"></i> Imagenología</li>
					<li><i class="fas fa-chevron-right"></i> Atención médica</li>
					<li><i class="fas fa-chevron-right"></i> Farmacia</li>
					<li><i class="fas fa-chevron-right"></i> Servicio a domicilio</li>
					<li><i class="fas fa-chevron-right"></i> Servicio a empresas</li>
					<li><i class="fas fa-chevron-right"></i> Consultorios disponibles</li>
				</ul>
				<ul>
					<span>Contacto</span>
					<li>
						<i class="fas fa-map-marker-alt"></i>
						<span>Lateral Periférico de la Juventud 7701
						Col. Fraccionamiento Barrancas
						Chihuahua</span>
					</li>
					<li>
						<i class="fas fa-envelope"></i>
						<span>info@clinicajuventud.com</span>
					</li>
					<li>
						<i class="fas fa-phone"></i>
						<span>(614) 4 25 38 60 - (614) 4 25 25 39 - (614) 4 55 88 35</span>
					</li>
				</ul>
			</div>
		</section>
		<section>Todos los derechos reservados &reg; | <strong>Made by:</strong> <a href="http://mixen.mx" target="_blank"><img src="{{ asset('assets/images/mixen.svg') }}" alt="Mixen: Boosting Brands"></a></section>
	</footer>
	{{-- Botón de Menú --}}
	<button>
		<span></span>
		<span></span>
		<span></span>
	</button>
	@yield('js')
</body>
</html>