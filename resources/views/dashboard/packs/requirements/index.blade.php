@extends('dashboard.master')

@section('title', 'Escritorio: Paquete -> Servicios -> Requerimientos')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/paquetes') }}">Paquetes</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/paquetes/servicio/' . $service->pack->id) }}">{{ $service->pack->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>{{ $service->pack->title }}: Requerimientos</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $service->pack->title }}: Servicios > Requerimientos <a href="{{ url('/escritorio/paquetes/requerimiento/crear/' . $service->id) }}"><i class="fas fa-plus"></i> Añadir requerimiento</a></h1>
			<table>
				<thead>
					<tr>
						<td>Requerimiento</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($requirements) > 0)
						@foreach($requirements as $requirement)
							<tr>
								<td>{{ $requirement->name }}</td>
								<td>{{ $requirement->user->name }} {{ $requirement->user->lastname }}</td>
								<td>
									@if($requirement->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $requirement->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/paquetes/requerimiento/editar/' . $requirement->id) }}"><i class="fas fa-pencil-alt"></i> Actualizar</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection