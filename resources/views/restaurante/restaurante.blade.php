@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}

            </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="titulo text-center">
                    <h1>Os nosos bares</h1>

                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('restaurante.restaurante') }}" id="search">
                        <div class="row">
                            <div class="form-group col">
                                <input type="text" id="search2" class="form-control" />
                            </div>
                            <div class="form-group col btn-search">
                                <input type="submit" value="Buscar" class="btn btn-outline-success btn-block" />
                            </div>
                        </div>
                    </form>
                </div>

                @foreach ($restaurante as $restaurante)
                    <div class="perfil">
                        @if ($restaurante->image)

                            <div class="avatar_contenedor zoom">

                                <img src="{{ route('restaurante.imagen', ['filename' => $restaurante->image]) }}"
                                    class="avatar" />
                            </div>
                        @endif

                        <div class="info">
                            <h2> <a href="{{ route('restaurante.detalle', ['id' => $restaurante->id]) }}">{{ $restaurante->nombre }}
                            </h2></a>
                            <h6>{{ $restaurante->email }} </h6>
                            <a href="{{ route('restaurante.detalle', ['id' => $restaurante->id]) }}"
                                class="btn btn-outline-success btn-block">Mais datos</a>

                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <hr>

                @endforeach

            </div>
            <div class="clearfix"></div>


        </div>
    </div>
@endsection
