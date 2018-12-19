@extends('web.master')

@section('title', 'Noticias | Clínica Juventud')

@section('content')
	<!-- Artículos -->
	<section id="articulos">
		<!-- Noticias -->
		<section id="noticias" style="padding-top: 60px">
			<span class="icon-logo"></span>
			<h1>Mantente Informado</h1>
			<sub style="margin-bottom: 60px;">Contamos con el personal capacitado que aplica el mejor control de calidad 
			en cada uno de nuestros procesos.</sub>
			<main>
				@foreach($articles as $article)
					<article>
						<header style="background-image: url('{{ asset('assets/images/articulos/' . $article->img) }}');">
							<time><i class="far fa-clock"></i> {{ $article->created_at->format('d | M | Y') }}</time>
						</header>
						<h1>{{ $article->title }}</h1>
						<p>{!! strip_tags(trim(substr($article->content, 0, 220))) !!}...</p>
						<a href="{{ url('/noticias/' . $article->slug) }}">Leer más</a>
					</article>
				@endforeach
			</main>
			{{ $articles->links() }}
		</section>
	</section>
@endsection

@section('js')
	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection