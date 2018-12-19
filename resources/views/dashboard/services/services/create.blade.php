@extends('dashboard.master')

@section('title', 'Escritorio: Servicio -> Añadir servicio')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/servicios') }}">Servicios</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/servicios/servicio/' . $service->id) }}">{{ $service->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>Añadir Servicio</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $service->title }} / Añadir servicio</h1>
			<form action="{{ url('/escritorio/servicios/servicio/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del servicio" autocomplete="off" autofocus value="{{ old('name') }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				<input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection