@extends('dashboard.master')

@section('title', 'Escritorio: Paquete -> Servicios')

@section('content')
	<div class="forms">
		<nav>
			<ul>
				<li><a href="{{ url('/escritorio/paquetes') }}">Paquetes</a></li>
				<li><span>/</span></li>
				<li><strong>{{ $pack->title }}: Servicios</strong></li>
			</ul>
		</nav>
		<div>
			<h1>{{ $pack->title }}: Servicios <a href="{{ url('/escritorio/paquetes/servicio/crear/' . $pack->id) }}"><i class="fas fa-plus"></i> Añadir servicio</a></h1>
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
					@if(count($packservices) > 0)
						@foreach($packservices as $packservice)
							<tr>
								<td>{{ $packservice->name }}</td>
								<td>{{ $packservice->user->name }} {{ $packservice->user->lastname }}</td>
								<td>
									@if($packservice->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $packservice->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/paquetes/servicio/editar/' . $packservice->id) }}"><i class="fas fa-pencil-alt"></i> Actualizar</a>
									<a href="{{ url('/escritorio/paquetes/requerimiento/' . $packservice->id) }}"><i class="far fa-eye"></i> Requerimientos</a>
									<a href="{{ url('/escritorio/paquetes/requerimiento/crear/' . $packservice->id) }}"><i class="fas fa-plus"></i> Requerimiento</a>
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