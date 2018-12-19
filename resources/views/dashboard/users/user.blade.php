@extends('dashboard.master')

@section('title')
	Escritorio: {{ Auth::user()->name }} {{ Auth::user()->lastname }}
@endsection

@section('content')
	<div class="forms">
		<div>
			<h1>Actualizar información</h1>
			<form action="{{ url('/escritorio/usuario/actualizar/' . Auth::user()->id) }}" method="POST">
				<div>
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" placeholder="Nombre" autocomplete="off" autofocus value="{{ Auth::user()->name }}">
					@if ($errors->has('name'))
						<div>{{ $errors->first('name')}}</div>
					@endif
				</div>
				<div>
					<label for="lastname">Apellido</label>
					<input type="text" name="lastname" id="lastname" placeholder="Apellido" autocomplete="off" autofocus value="{{ Auth::user()->lastname }}">
					@if ($errors->has('lastname'))
						<div>{{ $errors->first('lastname')}}</div>
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