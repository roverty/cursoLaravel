<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('css/mediaqueries.css') }}">
	<link rel="shortcut icon" href="{{asset('img/logo.png')}}">	 
</head>
<body class="text-center">
	<header>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.html">
				<img src="{{asset('img/logo.png')}}" width="30" height="30" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="{{route('pendientes')}}">Inicio<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('pendientes2')}}">Pendientes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('contacto')}}">Contacto</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<main>
		@yield('content')
	</main>
	<footer>

	</footer>
</body>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>