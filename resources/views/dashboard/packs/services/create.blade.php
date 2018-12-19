@extends('dashboard.master')

@section('title', 'Escritorio: Paquetes -> Añadir servicio')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/paquetes') }}">Paquetes</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/paquetes/servicio/' . $pack->id) }}">{{ $pack->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>Añadir Servicio</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $pack->title }} / Añadir servicio</h1>
			<form action="{{ url('/escritorio/paquetes/servicio/almacenar') }}" method="POST" enctype="multipart/form-data">
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
				<input type="hidden" name="pack_id" id="pack_id" value="{{ $pack->id }}">
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection