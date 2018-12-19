@extends('dashboard.master')

@section('title', 'Escritorio')

@section('content')
	<div id="index">
		<ul>
			<li>
				<span>Artículos</span>
				<span>{{ count($count_articles) }}</span>
			</li>
			<li>
				<span>Paquetes</span>
				<span>{{ count($count_packs) }}</span>
			</li>
			<li>
				<span>Servicios</span>
				<span>{{ count($count_services) }}</span>
			</li>
			<li>
				<span>Usuarios</span>
				<span>{{ count($count_users) }}</span>
			</li>
		</ul>
		<div>
			<h1>Últimos artículos</h1>
			<table>
				<thead>
					<tr>
						<td>Artículo</td>
						<td>Autor</td>
						<td>Estatus</td>
						<td>Fecha</td>
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
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div>
			<h1>Paquetes activos</h1>
			<table>
				<thead>
					<tr>
						<td>Paquete</td>
						<td>Autor</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($packs) > 0)
						@foreach($packs as $pack)
							<tr>
								<td>{{ $pack->title }}</td>
								<td>{{ $pack->user->name }} {{ $pack->user->lastname }}</td>
								<td>{{ $pack->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div>
			<h1>Servicios activos</h1>
			<table>
				<thead>
					<tr>
						<td>Servicio</td>
						<td>Autor</td>
						<td>Fecha</td>
					</tr>
				</thead>
				<tbody>
					@if(count($services) > 0)
						@foreach($services as $service)
							<tr>
								<td>{{ $service->title }}</td>
								<td>{{ $service->user->name }} {{ $service->user->lastname }}</td>
								<td>{{ $service->created_at->format('d | M | Y') }}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>Próximamente</td>
							<td>#</td>
							<td>#</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection