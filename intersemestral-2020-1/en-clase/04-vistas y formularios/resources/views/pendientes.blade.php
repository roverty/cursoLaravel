@extends('inicio')

@section('content')
 <div class="jumbotron">
	<h1 class="display-4">Bienvenido {{$name}}</h1>
	<h2>Hoy es {{date('d-M-Y')}}</h2>
	<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	<hr class="my-4">
	<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	<a class="btn btn-primary btn-lg" href="{{}}" role="button">Learn more</a>
</div>

@endsection