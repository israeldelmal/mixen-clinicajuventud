@extends('dashboard.master')

@section('title', 'Escritorio: Paquetes')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Paquetes</h1>
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
					@if(count($packs) > 0)
						@foreach($packs as $pack)
							<tr>
								<td>{{ $pack->title }}</td>
								<td>{{ $pack->user->name }} {{ $pack->user->lastname }}</td>
								<td>
									@if($pack->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $pack->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/paquetes/editar/' . $pack->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
									<a href="{{ url('/escritorio/paquetes/servicio/' . $pack->id) }}"><i class="far fa-eye"></i> Servicios</a>
									<a href="{{ url('/escritorio/paquetes/servicio/crear/' . $pack->id) }}"><i class="fas fa-plus"></i> Servicio</a>
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