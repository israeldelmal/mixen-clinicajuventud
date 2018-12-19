@extends('web.master')

@section('title')
	Servicio: {{ $service->title }} | Clínica Juventud
@endsection

@section('content')
	<!-- Servicio -->
	<section id="servicio">
		<header data-parallax="scroll" data-image-src="{{ asset('assets/images/servicio/fondo.jpg') }}">
			<h1>Calidad en la atención
			<strong>de tu salud</strong></h1>
		</header>
		<nav>
			<h2>Conoce nuestros Servicios</h2>
			<ul>
				@foreach($services as $servicio)
					@if($servicio->id == $service->id)
						<li><a class="active" href="{{ url('/servicios/'. $servicio->slug) }}">
							<img src="{{ asset('assets/images/servicios/' . $servicio->img) }}">
							<i>{{ $servicio->title }}</i>
						</a></li>
					@else
						<li><a href="{{ url('/servicios/'. $servicio->slug) }}">
							<img src="{{ asset('assets/images/servicios/' . $servicio->img) }}">
							<i>{{ $servicio->title }}</i>
						</a></li>
					@endif
				@endforeach
			</ul>
		</nav>
		<section>
			@if(count($service->serviceservices) > 0)
				<h3>{{ $service->title }}</h3>
				<sub>{{ $service->subtitle }}</sub>
				<div>
					<aside style="height: 700px; overflow-y: auto;">
						<ul>
							@foreach($ser_services as $serv)
								<li class="item-service">
									<a href="#">{{ $serv->name }}</a>
									<ul>
										@foreach($req_services as $req)
											@if($req->serviceservice->id == $serv->id)
												<li>{{ $req->name }}</li>
											@endif
										@endforeach
									</ul>
								</li>
							@endforeach
						</ul>
					</aside>
					<section>
						<img src="{{ asset('assets/images/servicios/' . $service->cover) }}">
					</section>
				</div>
			@else
				<h3>{{ $service->title }}</h3>
				<div style="background-image: url('{{ asset('assets/images/servicios/' . $service->cover) }}');">
					<div>
						<p>{{ $service->subtitle }}</p>
					</div>
				</div>
			@endif
		</section>
	</section>
@endsection

@section('js')
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection