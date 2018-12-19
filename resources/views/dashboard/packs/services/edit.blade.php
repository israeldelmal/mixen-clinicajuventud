@extends('dashboard.master')

@section('title', 'Escritorio: Paquetes -> Editar servicio')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/paquetes') }}">Paquetes</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/paquetes/servicio/' . $packservice->pack->id) }}">{{ $packservice->pack->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>Editar: {{ $packservice->name }}</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $packservice->pack->title }} / Actualizar servicio: {{ $packservice->name }}</h1>
			<form action="{{ url('/escritorio/paquetes/servicio/actualizar/' . $packservice->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del servicio" autocomplete="off" autofocus value="{{ $packservice->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="pack_id">Paquete</label>
					<select name="pack_id" id="pack_id">
						<option value="{{ $packservice->pack->id }}">{{ $packservice->pack->title }}</option>
						@foreach($packs as $pack)
							<option value="{{ $pack->id }}">{{ $pack->title }}</option>
						@endforeach
					</select>
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($packservice->status == false) selected @endif>Inactivo</option>
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