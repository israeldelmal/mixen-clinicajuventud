@extends('dashboard.master')

@section('title', 'Escritorio: Servicio -> Servicios -> Añadir requerimiento')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/servicios') }}">Servicios</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/servicios/servicio/' . $service->service->id) }}">{{ $service->service->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/servicios/requerimiento/' . $service->id) }}">{{ $service->name }}: Requerimiento</a></li>
				<li><span>/</span></li>
				<li><strong>Añadir Requerimiento</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $service->name }}: Añadir requerimiento</h1>
			<form action="{{ url('/escritorio/servicios/requerimiento/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del requerimiento" autocomplete="off" autofocus value="{{ old('name') }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				<input type="hidden" name="serviceservice_id" id="serviceservice_id" value="{{ $service->id }}">
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection