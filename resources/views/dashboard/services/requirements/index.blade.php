@extends('dashboard.master')

@section('title', 'Escritorio: Servicio -> Servicios -> Requerimientos')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/servicios') }}">Servicios</a></li>
				<li><span>/</span></li>
				<li><a href="{{ url('/escritorio/servicios/servicio/' . $service->service->id) }}">{{ $service->service->title }}: Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>{{ $service->service->title }}: Requerimientos</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $service->service->title }}: Servicios > Requerimientos <a href="{{ url('/escritorio/servicios/requerimiento/crear/' . $service->id) }}"><i class="fas fa-plus"></i> Añadir requerimiento</a></h1>
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
									<a href="{{ url('/escritorio/servicios/requerimiento/editar/' . $requirement->id) }}"><i class="fas fa-pencil-alt"></i> Actualizar</a>
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