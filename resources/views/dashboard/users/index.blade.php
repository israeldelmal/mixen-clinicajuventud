@extends('dashboard.master')

@section('title', 'Escritorio: Usuarios')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Usuarios</h1>
			<table>
				<thead>
					<tr>
						<td>Nombre</td>
						<td>E-mail</td>
						<td>Estatus</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->name }} {{ $user->lastname }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if($user->status == true)
									Activo
								@else
									Inactivo
								@endif
							</td>
							<td>
								<a href="{{ url('/escritorio/usuarios/editar/' . $user->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection