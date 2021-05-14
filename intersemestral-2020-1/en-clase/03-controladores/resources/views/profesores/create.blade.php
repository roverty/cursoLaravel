@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($profesores as $profesor)
       <div class="col-md-3">
           <div class="card border-success mb-3" style="max-width: 18rem;">
              <div class="card-header bg-transparent border-success">
                {{$profesor['nombre']}} {{$profesor['apellidos']}}
            </div>
              <div class="card-body text-success">
                <h5 class="card-title">Success card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <div class="card-footer bg-transparent border-success">Footer</div>
            </div>
       </div>
       @endforeach
    </div>
</div>
@endsection
