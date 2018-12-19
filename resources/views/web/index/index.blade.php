@extends('web.master')

@section('title', 'Clínica Juventud')

@section('content')
	<!-- Cabecera -->
	@foreach($headers as $header)
		<header id="inicio" style="background-image: url('{{ asset('assets/images/cabecera/' . $header->img) }}');">
			<div>
				<h1 style="text-align: center; margin-bottom: 40px;">{{ $header->h1 }}</h1>
				<span style="white-space: pre-line; text-align: center; width: 100%;">{{ $header->sub }}</span>
			</div>
		</header>
	@endforeach
	<!-- Descanso #1 -->
	@foreach($breaks_1 as $break)
		<section id="descanso-1">
			<div>
				<div>
					<h1>{{ $break->h1 }}</h1>
					<a class="item-nav" href="#contacto">Contáctanos</a>
				</div>
			</div>
			<div>
				<img src="{{ asset('assets/images/descanso-1/' . $break->img) }}" alt="{{ $break->h1 }}">
			</div>
		</section>
	@endforeach
	<!-- Servicios -->
	<section id="servicios">
		<span class="icon-logo"></span>
		<h1>Conoce nuestros Servicios</h1>
		<sub>Contamos con el personal capacitado que aplica el mejor control de calidad 
		en cada uno de nuestros procesos.</sub>
		<section>
			@if(count($services) > 0)
				@foreach($services as $service)
					<figure>
						<a href="{{ url('/servicios/' . $service->slug) }}">
							<img src="{{ asset('assets/images/servicios/' . $service->img) }}" alt="Imagen: {{ $service->title }}">
							<figcaption>{{ $service->title }}</figcaption>
						</a>
					</figure>
				@endforeach
			@else
				<h2 style="font-size: 2em;
				text-transform: uppercase;
				letter-spacing: 2px;
				text-align: center;">Próximamente</h2>
			@endif
		</section>
	</section>
	<!-- Descanso #2 -->
	@foreach($breaks_2 as $break)
		<section id="descanso-2" style="background-image: url('{{ asset('assets/images/descanso-2/' . $break->img) }}');">
			<div>
				<h1>{{ $break->h1 }}</h1>
				<a class="item-nav" href="#contacto">Contáctanos</a>
			</div>
		</section>
	@endforeach
	<!-- Paquetes -->
	<section id="paquetes">
		<span class="icon-logo"></span>
		<h1>Aprovecha nuestros Paquetes</h1>
		<sub>Contamos con el personal capacitado que aplica el mejor control de calidad 
		en cada uno de nuestros procesos.</sub>
		<section>
			@if(count($packs) > 0)
				@foreach($packs as $pack)
					<div style="background-image: url('{{ asset('assets/images/paquetes/' . $pack->img) }}');">
						<a href="{{ url('/paquetes/' . $pack->slug) }}">
							<h2>{{ $pack->title }}</h2>
						</a>
					</div>
				@endforeach
			@else
				<h2 style="font-size: 2em;
				text-transform: uppercase;
				letter-spacing: 2px;
				text-align: center;
				width: 100%;">Próximamente</h2>
			@endif
		</section>
	</section>
	<!-- Descanso #3 -->
	@foreach($breaks_3 as $break)
		<section id="descanso-3">
			<div>
				<img src="{{ asset('assets/images/descanso-3/' . $break->img) }}" alt="Contribuimos a mejorar la calidad de vida de la población de Chihuahua">
			</div>
			<div>
				<div>
					<h1>{{ $break->h1 }}</h1>
					<a class="item-nav" href="#contacto">Contáctanos</a>
				</div>
			</div>
		</section>
	@endforeach
	<!-- Noticias -->
	<section id="noticias">
		<span class="icon-logo"></span>
		<h1>Mantente Informado</h1>
		<sub>Contamos con el personal capacitado que aplica el mejor control de calidad 
		en cada uno de nuestros procesos.</sub>
		<a href="{{ url('/noticias') }}">Ver todas las noticias</a>
		<main>
			@if(count($articles) > 0)
				@foreach($articles as $article)
					<article>
						<header style="background-image: url('{{ asset('assets/images/articulos/' . $article->img) }}');">
							<time><i class="far fa-clock"></i> {{ $article->created_at->format('d | M | Y') }}</time>
						</header>
						<h1>{{ $article->title }}</h1>
						<p>{!! strip_tags(trim(substr($article->content, 0, 220))) !!}...</p>
						<a href="{{ url('/noticias/' . $article->slug) }}">Leer más</a>
					</article>
				@endforeach
			@else
				<h2 style="font-size: 2em;
				text-transform: uppercase;
				letter-spacing: 2px;
				text-align: center;
				width: 100%;">Próximamente</h2>
			@endif
		</main>
	</section>
	<!-- Contacto -->
	<section id="contacto">
		<map name="contact">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.588516470437!2d-106.13648368439604!3d28.672036982402307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea425fd950f737%3A0x5602aac967b30ff!2sCl%C3%ADnica+Juventud!5e0!3m2!1ses-419!2smx!4v1535475874148" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		</map>
		<div style="background-image: url('assets/images/contacto/fondo.jpg');">
			<form action="#" method="POST" id="FormContact">
				<div>
					<input type="text" name="name" id="name" autocomplete="off" placeholder="Nombre">
					<div id="error_name"></div>
				</div>
				<div>
					<input type="text" name="company" id="company" autocomplete="off" placeholder="Empresa">
					<div id="error_company"></div>
				</div>
				<div>
					<input type="email" name="email" id="email" autocomplete="off" placeholder="Correo Electrónico">
					<div id="error_email"></div>
				</div>
				<div>
					<input type="tel" name="tel" id="tel" autocomplete="off" placeholder="Teléfono">
					<div id="error_tel"></div>
				</div>
				<div>
					<textarea name="message" id="message" rows="5" placeholder="Mensaje"></textarea>
					<div id="error_message"></div>
				</div>
				<div>
					<button>Enviar</button>
				</div>
				<figure>
					<img src="assets/images/loader.svg">
				</figure>
				{{ csrf_field() }}
			</form>
		</div>
	</section>
@endsection

@section('js')
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script>
		$('#FormContact').on('submit', function(event) {
			event.preventDefault();
			let ID   = $(this).serialize();
			let Form = $(this);

			$(Form).find('figure').slideDown('normal');

			$.ajax({
				url: '{{ url("/contacto") }}',
				type: 'POST',
				dataType: 'json',
				data: ID,
				cache: false,
			})
			.done(function(data) {
				if (data.send == true) {
					alert('Gracias por escribirnos, nos ponemos en contacto a la brevedad.');
					$('.errors').fadeOut(300);
					$(Form).find('#name').val('');
					$(Form).find('#company').val('');
					$(Form).find('#email').val('');
					$(Form).find('#tel').val('');
					$(Form).find('#message').val('');
				} else if (data.fail == true) {
					$.each(data.errors, function(index, val) {
						$('#' + index).focusin(function() {
							$('#error_' + index).slideUp('normal');
						});
						$('#error_' + index).html(val).slideDown('normal');
					});
				}
			})
			.fail(function() {
				alert('¡Ocurrió un error inesperado, inténtalo más tarde!');
			})
			.always(function(data) {
				if (data.send == true) {
					$(Form).find('figure').slideUp('normal');
				}

				if (data.fail == true) {
					$(Form).find('figure').slideUp('normal');
				}
			});
		});
	</script>
@endsection