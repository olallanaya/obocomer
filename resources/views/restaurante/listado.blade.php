

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
                    <h1>Listado</h1>
                   

                </div>

                
                </div>

                @foreach ($restaurante as $restaurante)
                    <div class="perfil">
                        @if ($restaurante->image)
                            <div class="avatar_contenedor">
                                <img src="{{ route('restaurante.imagen', ['filename' => $restaurante->image]) }}"
                                    class="avatar" />
                            </div>
                        @endif

                        <div class="info">
                            <h2>  <a href="{{ route('restaurante.detalle', ['id' => $restaurante->id]) }}">{{ $restaurante->nombre }} </h2></a>
                            <h6>{{ $restaurante->email }} </h6>
                           <a href="{{ route('restaurante.borrar', ['id' => $restaurante->id]) }}" class="btn btn-outline-success btn-block">Borrar</a>
                             <a href="{{ route('restaurante.editar', ['id' => $restaurante->id]) }}" class="btn btn-outline-success btn-block">Editar</a>
                        <a href="{{ route('restaurante.detalle', ['id' => $restaurante->id]) }}" class="btn btn-outline-success btn-block">Reservas</a>
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
