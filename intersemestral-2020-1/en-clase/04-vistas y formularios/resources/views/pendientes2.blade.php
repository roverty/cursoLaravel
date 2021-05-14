@extends('inicio')

@section('content')
	<h1>Mis pendientes</h1>
	@if($eventos)
		@foreach($eventos as $mievento)
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			     <h3>{{$mievento}}</h3>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			     <span aria-hidden="true">&times;</span>
			</button>
			</div>
		@endforeach
	@else
		<h3>Eres libre</h3>
	@endif


@endsection