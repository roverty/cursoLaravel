@extends('inicio')

@section('content')
<div class="container">
	<h1 class="mt-4 mb-4">Mandame un mensaje....</h1>
	<form method="post" action="{{route('enviardatos')}}">
		{{ csrf_field() }}
	  <div class="form-row">
		
	<div class="col">
	<input name="nombre" type="text" class="form-control" placeholder="Nombre(s)">
	</div>
	<div class="col">
<input name="apellidos" type="text" class="form-control" placeholder="Apellidos">
</div>
	</div><br>
	<div class="form-row">
	<div class="form-group col-md-6">
<input name="email" type="email" class="form-control" id="inputEmail4" placeholder="E-mail">
	</div>
<div  class="form-group col-md-6">
<input name="contraseña" placeholder="Contraseña" type="password" class="form-control" id="inputPassword4">
	</div>
	</div><br>
	<div class="form-group">
	<div class="form-check">
		<input name="termino" class="form-check-input" type="checkbox" id="gridCheck">
	<label class="form-check-label" for="gridCheck">
		            Acepto términos y condiciones
	</label>
	</div>
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>


</div>

@endsection

