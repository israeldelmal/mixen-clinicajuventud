@extends('dashboard.master')

@section('title', 'Escritorio: Crear paquete')

@section('content')
	<div class="forms">
		<div>
			<h1>Crear paquete</h1>
			<form action="{{ url('/escritorio/paquetes/almacenar') }}" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">Título</label>
					<input type="text" name="title" id="title" placeholder="Título del artículo" autocomplete="off" autofocus value="{{ old('title') }}">
					@if ($errors->has('title'))
						<div>{{ $errors->first('title')}}</div>
					@endif
				</div>
				<div>
					<label for="img">Miniatura del paquete</label>
					<input type="file" name="img" id="img">
					@if ($errors->has('img'))
						<div>{{ $errors->first('img')}}</div>
					@endif
				</div>
				<div>
					<label for="cover">Portada del paquete</label>
					<input type="file" name="cover" id="cover">
					@if ($errors->has('cover'))
						<div>{{ $errors->first('cover')}}</div>
					@endif
				</div>
				<div>
					<button type="submit">Crear</button>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endsection