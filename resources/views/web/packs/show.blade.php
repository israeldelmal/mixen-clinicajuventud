@extends('web.master')

@section('title')
	Paquete: {{ $pack->title }} | Clínica Juventud
@endsection

@section('content')
	<!-- Paquetes -->
	<section id="paquetes" style="padding: 0px !important; padding-top: 80px !important; margin-top: 130px !important;">
		<span class="icon-logo"></span>
		<h1>Aprovecha nuestros Paquetes</h1>
		<sub>Contamos con el personal capacitado que aplica el mejor control de calidad 
		en cada uno de nuestros procesos.</sub>
		<section>
			@foreach($packs as $paquete)
				@if($paquete->id == $pack->id)
					<div class="active-pack" style="background-image: url('{{ asset('assets/images/paquetes/' . $paquete->img) }}');">
						<a href="{{ url('/paquetes/' . $paquete->slug) }}">
							<h2>{{ $paquete->title }}</h2>
						</a>
					</div>
				@else
					<div style="background-image: url('{{ asset('assets/images/paquetes/' . $paquete->img) }}');">
						<a href="{{ url('/paquetes/' . $paquete->slug) }}">
							<h2>{{ $paquete->title }}</h2>
						</a>
					</div>
				@endif
			@endforeach
		</section>
	</section>
	<!-- Servicio -->
	<section id="servicio">
		<section>
			<div>
				<aside>
					@if(count($ser_packs) > 0)
						<ul>
							@foreach($ser_packs as $paquete)
								<li class="item-service">
									<a href="#">{{ $paquete->name }}</a>
									<ul>
										@foreach($req_packs as $req)
											@if($req->packservice->id == $paquete->id)
												<li>{{ $req->name }}</li>
											@endif
										@endforeach
									</ul>
								</li>
							@endforeach
						</ul>
					@else
						<ul>
							<li class="item-service">
								<a href="#">Próximamente</a>
								<ul>
									<li>#</li>
									<li>#</li>
									<li>#</li>
									<li>#</li>
									<li>#</li>
								</ul>
							</li>
						</ul>
					@endif
				</aside>
				<section>
					<img src="{{ asset('assets/images/paquetes/' . $pack->cover) }}">
				</section>
			</div>
		</section>
	</section>
@endsection

@section('js')
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/parallax.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection