@extends('dashboard.master')

@section('title', 'Escritorio: Paquete -> Servicios -> Editar requerimiento')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/paquetes') }}">Paquetes</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/paquetes/servicio/' . $requirement->packservice->pack->id) }}">{{ $requirement->packservice->pack->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/paquetes/requerimiento/' . $requirement->packservice->id) }}">{{ $requirement->packservice->name }}: Requerimiento</a></li>
				<li><span>/</span></li>
				<li><strong>Editar Requerimiento</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $requirement->packservice->name }}: Editar requerimiento</h1>
			<form action="{{ url('/escritorio/paquetes/requerimiento/actualizar/' . $requirement->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre del requerimiento" autocomplete="off" autofocus value="{{ $requirement->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="packservice_id">Servicio</label>
					<select name="packservice_id" id="packservice_id">
						<option value="{{ $requirement->packservice->id }}">{{ $requirement->packservice->name }}</option>
						@foreach($services as $service)
							<option value="{{ $service->id }}">{{ $service->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('packservice_id'))
						<div>{{ $errors->first('packservice_id')}}</div>
					@endif
				</div>
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option value="0" @if($requirement->status == false) selected @endif>Inactivo</option>
					</select>
					@if ($errors->has('status'))
						<div>{{ $errors->first('status')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Actualizar</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection