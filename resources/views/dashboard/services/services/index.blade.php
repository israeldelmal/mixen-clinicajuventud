@extends('dashboard.master')

@section('title', 'Escritorio: Servicio -> Servicios')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/servicios') }}">Servicios</a></li>
				<li><span>/</span></li>
				<li><strong>{{ $service->title }}: Servicios</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $service->title }}: Servicios <a href="{{ url('/escritorio/servicios/servicio/crear/' . $service->id) }}"><i class="fas fa-plus"></i> Añadir servicio</a></h1>
			<table>
				<thead>
					<tr>
						<td>Servicio</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($serviceservices) > 0)
						@foreach($serviceservices as $serviceservice)
							<tr>
								<td>{{ $serviceservice->name }}</td>
								<td>{{ $serviceservice->user->name }} {{ $serviceservice->user->lastname }}</td>
								<td>
									@if($serviceservice->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $serviceservice->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/servicios/servicio/editar/' . $serviceservice->id) }}"><i class="fas fa-pencil-alt"></i> Actualizar</a>
									<a href="{{ url('/escritorio/servicios/requerimiento/' . $serviceservice->id) }}"><i class="far fa-eye"></i> Requerimientos</a>
									<a href="{{ url('/escritorio/servicios/requerimiento/crear/' . $serviceservice->id) }}"><i class="fas fa-plus"></i> Requerimiento</a>
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