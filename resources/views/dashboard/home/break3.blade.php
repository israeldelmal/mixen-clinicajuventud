@extends('dashboard.master')

@section('title', 'Escritorio: Descanso #3')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Descanso #3</h1>
			<form action="{{ url('/escritorio/descanso-3/actualizar/' . $break->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<textarea name="h1" id="h1" rows="5" placeholder="Título del descanso">{{ $break->h1 }}</textarea>
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Imagen de Fondo</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
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