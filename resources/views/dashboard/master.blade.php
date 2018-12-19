<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/dashboard/style.css') }}">
</head>
<body>
	{{-- Navegación --}}
	<nav>
		<div>
			<a href="{{ url('/escritorio/usuario/' . Auth::user()->id) }}">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
			<a href="{{ url('/escritorio') }}"><i class="fas fa-tachometer-alt"></i></a>
			<a href="{{ url('/') }}" target="_blank"><i class="fas fa-home"></i></a>
			<a href="{{ url('/autenticacion/cerrar-sesion') }}"><i class="fas fa-power-off"></i></a>
		</div>
	</nav>
	{{-- Menú --}}
	<aside>
		<div>
			<img src="{{ asset('assets/images/logo.png') }}">
			<h1>Escritorio</h1>
		</div>
		<ul>
			<li>
				<a href="#"
					@if(Route::is('escritorio/usuarios')) class="active" @endif
					@if(Route::is('escritorio/editar')) class="active" @endif
				><span class="icon-Users"></span> Usuarios</a>
				<ul
					@if(Route::is('escritorio/usuarios')) class="show" @endif
					@if(Route::is('escritorio/editar')) class="show" @endif
				>
					<li><a
						@if(Route::is('escritorio/usuarios')) class="active" @endif
						@if(Route::is('escritorio/editar')) class="active" @endif
						href="{{ url('/escritorio/usuarios') }}"><span class="icon-List"></span> Lista</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/cabeceras')) class="active" @endif
					@if(Route::is('escritorio/descanso-1')) class="active" @endif
					@if(Route::is('escritorio/descanso-2')) class="active" @endif
					@if(Route::is('escritorio/descanso-3')) class="active" @endif
				><span class="icon-Home"></span> Inicio</a>
				<ul
					@if(Route::is('escritorio/cabeceras')) class="show" @endif
					@if(Route::is('escritorio/descanso-1')) class="show" @endif
					@if(Route::is('escritorio/descanso-2')) class="show" @endif
					@if(Route::is('escritorio/descanso-3')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/cabeceras')) class="active" @endif href="{{ url('/escritorio/cabeceras/1') }}"><span class="icon-Edit"></span> Cabecera</a></li>
					<li><a @if(Route::is('escritorio/descanso-1')) class="active" @endif href="{{ url('/escritorio/descanso-1/1') }}"><span class="icon-Edit"></span> Descanso #1</a></li>
					<li><a @if(Route::is('escritorio/descanso-2')) class="active" @endif href="{{ url('/escritorio/descanso-2/1') }}"><span class="icon-Edit"></span> Descanso #2</a></li>
					<li><a @if(Route::is('escritorio/descanso-3')) class="active" @endif href="{{ url('/escritorio/descanso-3/1') }}"><span class="icon-Edit"></span> Descanso #3</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/articulos')) class="active" @endif
					@if(Route::is('escritorio/articulos/crear')) class="active" @endif
					@if(Route::is('escritorio/articulos/editar')) class="active" @endif
				><span class="icon-Articles"></span> Blog</a>
				<ul
					@if(Route::is('escritorio/articulos')) class="show" @endif
					@if(Route::is('escritorio/articulos/crear')) class="show" @endif
					@if(Route::is('escritorio/articulos/editar')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/articulos')) class="active" @endif href="{{ url('/escritorio/articulos') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/articulos/crear')) class="active" @endif href="{{ url('/escritorio/articulos/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/servicios')) class="active" @endif
					@if(Route::is('escritorio/servicios/crear')) class="active" @endif
					@if(Route::is('escritorio/servicios/servicios')) class="active" @endif
				><span class="icon-Services"></span> Servicios</a>
				<ul
					@if(Route::is('escritorio/servicios')) class="show" @endif
					@if(Route::is('escritorio/servicios/crear')) class="show" @endif
					@if(Route::is('escritorio/servicios/servicios')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/servicios')) class="active" @endif href="{{ url('/escritorio/servicios') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/servicios/crear')) class="active" @endif href="{{ url('/escritorio/servicios/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
			<li>
				<a href="#"
					@if(Route::is('escritorio/paquetes')) class="active" @endif
					@if(Route::is('escritorio/paquetes/crear')) class="active" @endif
					@if(Route::is('escritorio/paquetes/servicios')) class="active" @endif
				><span class="icon-Packages"></span> Paquetes</a>
				<ul
					@if(Route::is('escritorio/paquetes')) class="show" @endif
					@if(Route::is('escritorio/paquetes/crear')) class="show" @endif
					@if(Route::is('escritorio/paquetes/servicios')) class="show" @endif
				>
					<li><a @if(Route::is('escritorio/paquetes')) class="active" @endif href="{{ url('/escritorio/paquetes') }}"><span class="icon-List"></span> Lista</a></li>
					<li><a @if(Route::is('escritorio/paquetes/crear')) class="active" @endif href="{{ url('/escritorio/paquetes/crear') }}"><span class="icon-Add"></span> Añadir</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	{{-- Contenido --}}
	<section>
		@yield('content')
	</section>
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	@yield('js')
</body>
</html>