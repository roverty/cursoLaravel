@extends('inicio')

@section('content')
<div class="container">
	<h1 class="mt-4 mb-4">Mis contactos</h1>
	<div class="row">

	@foreach($contactos as $persona)
		<div class="col-sm-12 col-md-3">
			<div class="card border-primary mb-3" style="max-width: 18rem;">
				  <div class="card-header">
					<h2>{{$persona['nombre']}}</h2>
				  	<h4>{{$persona['apellido']}}</h4>
				  </div>
				  <div class="card-body text-primary">
					<h5 class="card-title">{{$persona['tel']}}</h5>
	<img class="img-fluid" src="{{asset('img/').'/'.$persona['sexo'].'.jpg'}}">
				  </div>
			</div>
		</div>
	@endforeach

	</div>
</div>


@endsection