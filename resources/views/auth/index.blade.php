<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Autenticación</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
	<div>
		<nav>
			<a href="#" class="active" data-menu="#FormUserAuth">Iniciar sesión</a>
			<a href="#" data-menu="#FormUserCreate">Crear cuenta</a>
			<a href="#" data-menu="#FormUserPass">Recuperar contraseña</a>
		</nav>
		<form action="#" method="POST" id="FormUserAuth">
			<div>
				<label for="auth_email">Correo electrónico</label>
				<input type="email" name="auth_email" id="auth_email" placeholder="ejemplo@ejemplo.com" autocomplete="off" autofocus>
				<div id="error_auth_email"></div>
			</div>
			<div>
				<label for="auth_password">Contraseña</label>
				<input type="password" name="auth_password" id="auth_password" placeholder="Escribe tu contraseña" autocomplete="off">
				<div id="error_auth_password"></div>
			</div>
			<div>
				<button type="submit">Iniciar</button>
			</div>
			<figure>
				<img src="{{ asset('assets/images/loader.svg') }}" alt="Imagen de carga">
			</figure>
			{{ csrf_field() }}
		</form>
		<form action="#" method="POST" id="FormUserCreate">
			<div>
				<label for="name">Nombre</label>
				<input type="text" name="name" id="name" placeholder="Nombre o nombres" autocomplete="off">
				<div id="error_name"></div>
			</div>
			<div>
				<label for="lastname">Apellido</label>
				<input type="text" name="lastname" id="lastname" placeholder="Apellido o apellidos" autocomplete="off">
				<div id="error_lastname"></div>
			</div>
			<div>
				<label for="email">Correo electrónico</label>
				<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" autocomplete="off">
				<div id="error_email"></div>
			</div>
			<div>
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" placeholder="Escribe tu contraseña" autocomplete="off">
				<div id="error_password"></div>
			</div>
			<div>
				<label for="cpassword">Confirmar contraseña</label>
				<input type="password" name="cpassword" id="cpassword" placeholder="Confirma tu contraseña" autocomplete="off">
				<div id="error_cpassword"></div>
			</div>
			<div>
				<button type="submit">Crear</button>
			</div>
			<figure>
				<img src="{{ asset('assets/images/loader.svg') }}" alt="Imagen de carga">
			</figure>
			{{ csrf_field() }}
		</form>
		<form action="#" method="POST" id="FormUserPass">
			<div>
				<label for="pass_email">Correo electrónico para reestablecer tu contraseña</label>
				<input type="email" name="pass_email" id="pass_email" placeholder="ejemplo@ejemplo.com" autocomplete="off" autofocus>
			</div>
			<div>
				<button type="submit">Recuperar</button>
			</div>
			{{ csrf_field() }}
		</form>
	</div>
	{{-- JavaScript --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/auth.js') }}"></script>
	<script>
		// Autenticación
		$('#FormUserAuth').on('submit', function(event) {
			event.preventDefault();
			let ID   = $(this).serialize();
			let Form = $(this);

			$(Form).find('figure').slideDown('normal');

			$.ajax({
				url: '{{ url('/autenticacion/autenticar') }}',
				type: 'POST',
				dataType: 'json',
				data: ID,
			})
			.done(function(data) {
				if (data.login == true) {
					$(Form).find('figure').delay(1000).slideUp('normal', function() {
						window.location.href = "{{ url('/escritorio') }}";
					});
				} else if (data.login == false) {
					$(Form).find('figure').delay(1000).slideUp('normal', function() {
						$('#error_auth_password').html('Tus datos son incorrectos o no tienes permisos').slideDown('normal');
					});
				} else if (data.fail == true) {
					$(Form).find('figure').delay(1000).slideUp('normal', function() {
						$.each(data.errors, function(index, val) {
							$('#' + index).focusin(function() {
								$('#error_' + index).slideUp('normal');
							});
							$('#error_' + index).html(val).slideDown('normal');
						});
					});
				}
			})
			.fail(function() {
				alert('Ocurrió un error, intenta más tarde');
			});
		});

		// Creación de usuario
		$('#FormUserCreate').on('submit', function(event) {
			event.preventDefault();
			let ID   = $(this).serialize();
			let Form = $(this);

			$(Form).find('figure').slideDown('normal');

			$.ajax({
				url: '{{ url('/autenticacion/crear') }}',
				type: 'POST',
				dataType: 'json',
				data: ID,
			})
			.done(function(data) {
				if (data.create == true) {
					$(Form).find('figure').delay(1000).slideUp('normal', function() {
						$('body > div > nav > a:first-of-type').trigger('click');
					});
				} else if (data.fail == true) {
					$(Form).find('figure').delay(1000).slideUp('normal', function() {
						$.each(data.errors, function(index, val) {
							$('#' + index).focusin(function() {
								$('#error_' + index).slideUp('normal');
							});
							$('#error_' + index).html(val).slideDown('normal');
						});
					});
				}
			})
			.fail(function() {
				alert('Ocurrió un error, intenta más tarde');
			});
		});
	</script>
</body>
</html>