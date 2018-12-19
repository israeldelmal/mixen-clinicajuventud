@extends('dashboard.master')

@section('title', 'Escritorio: Editar usuario')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar usuario: {{ $user->name }} {{ $user->lastname }}</h1>
			<form action="{{ url('/escritorio/usuarios/actualizar/' . $user->id) }}" method="POST">
				<div>
					<label for="status">Estatus</label>
					<select name="status" id="status">
						<option value="1">Activo</option>
						<option @if($user->status == false) selected @endif value="0">Inactivo</option>
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