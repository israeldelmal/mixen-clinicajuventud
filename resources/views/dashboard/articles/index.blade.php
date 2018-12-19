@extends('dashboard.master')

@section('title', 'Escritorio: Artículos')

@section('content')
	<div class="forms">
		<div>
			<h1>Listado de Artículos</h1>
			<table>
				<thead>
					<tr>
						<td>Título</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Decha de publicación</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@if(count($articles) > 0)
						@foreach($articles as $article)
							<tr>
								<td>{{ $article->title }}</td>
								<td>{{ $article->user->name }} {{ $article->user->lastname }}</td>
								<td>
									@if($article->status == true)
										Activo
									@else
										Inactivo
									@endif
								</td>
								<td>{{ $article->created_at->format('d | M | Y') }}</td>
								<td>
									<a href="{{ url('/escritorio/articulos/editar/' . $article->id) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
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