@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            @foreach($cursos as $curso)
            <div class="col-md-4 col-sm-6 col-12 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/cursos/'.$curso->nombre_imagen)}}" alt="curso-c">
                    <div class="card-body">
                        <h4 class="card-title">{{$curso->nombre}}</h4>
                        <p class="card-text">
                            Lugar: {{$curso->lugar->salon}}
                            <br>  Horario: </p>
                    </div>
                    <div class="card-footer">
                        <a class="card-link" href="">Temario</a>
                        <a class="card-link" href="" data-toggle="modal" data-target="" >Detalles</a>
                        @guest
                            <a class="card-link" href="{{ route('login') }}">Comprar</a>
                        @else
                            <form action="" method="post" class="card-link d-inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value=" ">
                                <input type="hidden" name="user_id" value=" ">
                                <button type="submit" class="btn btn-link"><i class="fas fa-cart-plus"></i> </button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
