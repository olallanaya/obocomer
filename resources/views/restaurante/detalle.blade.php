@extends('layouts.app')

@section('content')
    <div class="container pantalla col-md-6">
   @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}

            </div>
        @endif

        <div class="card publicacion ">
            <div class="card-header">

                <div class="contenido">
                    <h4 class="titulo text-center"> {{ $restaurante->nombre }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="imagen-contenido">
                    @if ($restaurante->image)

                        <img src="{{ route('restaurante.imagen', ['filename' => $restaurante->image]) }}" />

                    @endif
                </div>

            </div>
            <div class="row justify-content-center h-100">
            <div class="col-sm-8 ">
            <div class="descripcion  text-center">
                <h6>{{ $restaurante->email }} </h6>
                <h6>{{ $restaurante->direccion }} </h6>
                <h6>{{ $restaurante->localidad }} </h6>
                <h6>{{ $restaurante->provincia }} </h6>
                <h6>{{ $restaurante->descripcion }} </h6>
                <h6>{{ $restaurante->telefono }} </h6>
            </div>
             
            <button type="button" class="btn btn-outline-success btn-block  " data-toggle="modal" data-target="#myModal">
                Carta
            </button>
            <a href="" class="btn btn-outline-success  btn-block ">Reserva</a>
           </div> 
</div>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Menu</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <img src="{{ route('restaurante.imagen', ['filename' => $restaurante->menu]) }}" />



                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Pechar</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
