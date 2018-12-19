@extends('dashboard.master')

@section('title', 'Escritorio: Cabeceras')

@section('content')
	<div class="forms">
		<div>
			<h1>Editar Cabecera</h1>
			<form action="{{ url('/escritorio/cabeceras/actualizar/' . $header->id) }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="h1">Título</label>
					<textarea name="h1" id="h1" rows="5" placeholder="Título del servicio">{{ $header->h1 }}</textarea>
					@if ($errors->has('h1'))
						<div>{{ $errors->first('h1')}}</div>
					@endif
				</div>
				<div>
					<label for="sub">Subtítulo</label>
					<textarea name="sub" id="sub" rows="5" placeholder="Subtítulo del servicio">{{ $header->sub }}</textarea>
					@if ($errors->has('sub'))
						<div>{{ $errors->first('sub')}}</div>
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