@extends('dashboard.master')

@section('title', 'Escritorio: Servicios -> Editar servicio')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/servicios') }}">Servicios</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/servicios/servicio/' . $serviceservice->service->id) }}">{{ $serviceservice->service->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>Editar: {{ $serviceservice->name }}</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $serviceservice->service->title }} / Actualizar servicio: {{ $serviceservice->name }}</h1>
			<form action="{{ url('/escritorio/servicios/servicio/actualizar/' . $serviceservice->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del servicio" autocomplete="off" autofocus value="{{ $serviceservice->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="service_id">Paquete</label>
					<select name="service_id" id="service_id">
						<option value="{{ $serviceservice->service->id }}">{{ $serviceservice->service->title }}</option>
						@foreach($services as $service)
							<option value="{{ $service->id }}">{{ $service->title }}</option>
						@endforeach
					</select>
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($serviceservice->status == false) selected @endif>Inactivo</option>
					</select>
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection