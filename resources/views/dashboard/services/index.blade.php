@extends('dashboard.master')

@section('title', 'Escritorio: Servicios')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Servicios</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($services) > 0)
						@foreach($services as $service)
							<tr>
								<td>{{ $service->title }}</td>
								<td>{{ $service->user->name }} {{ $service->user->lastname }}</td>
								<td>
									@if($service->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $service->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/servicios/editar/' . $service->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
									<a href="{{ url('/escritorio/servicios/servicio/' . $service->id) }}"><i class="far fa-eye"></i> Servicios</a>
									<a href="{{ url('/escritorio/servicios/servicio/crear/' . $service->id) }}"><i class="fas fa-plus"></i> Servicio</a>
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