@extends('web.master')

@section('title')
	Noticias: {{ $article->title }} | Clínica Juventud
@endsection

@section('content')
	<!-- Artículo -->
	<section id="articulo">
		<div>
			<article>
				<h1>{{ $article->title }}</h1>
				{!! $article->content !!}
			</article>
		</div>
		<div style="background-image: url({{ asset('assets/images/articulos/' . $article->img) }});"></div>
	</section>
@endsection

@section('js')
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection