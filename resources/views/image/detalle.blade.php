@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card publicacion detalle">
                    <div class="card-header">
                        @if ($image->user->image)
                            <div class="avatar_contenedor">
                                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar" />
                            </div>
                        @endif
                        <div class="contenido">
                            {{ $image->user->name }}
                            <span class="nick">{{ '| @' . $image->user->nick }}</span>

                        </div>
                    </div>
                    <div class="card-body imagen-detalle">
                        <div class="imagen-contenido imagen-detalle">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
                        </div>
                        <div class="restaurante">
                            <span class"rest">{{ $image->restaurante->nombre }}</span>
                        </div>
                        <div class="descripcion">
                            <span class="nick">{{ '@' . $image->user->nick }}</span>
                            <span class="fecha"> {{ ' | ' . \FormatTime::LongTimeFilter($image->created_at) }}</span>
                            <p>{{ $image->descripcion }}</p>
                        </div>

                        <div class="gustas">
                            {{--comprobamos que el usuario dio al like creamos una variable x
                            defecto el like a false--}}
                            {{-- Solo queremos que aparezca la botonera si son
                            nuestra--}}
                            @if (Auth::user() && Auth::user()->id == $image->user->id)
                                <div class="botonera">



                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-success coment-bt" data-toggle="modal"
                                        data-target="#myModal"> BORRAR </button>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">CONFIRMACION DE BORRADO</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Tas seguro que a queres borrar a publicacion??
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success coment-bt"
                                                        data-dismiss="modal">CERRAR</button>
                                                    <a href="{{ route('image.borrar', ['id' => $image->id]) }}"
                                                        class="btn btn-success coment-bt"> BORRAR </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            @endif

                            <div class="comentarios">
                                <h4> Comentarios </h4>

                                <form method="POST" action="{{ route('comentario.save') }}">
                                    @csrf
                                    <input type="hidden" name="imagen_id" value="{{ $image->id }}" />
                                    <input type="hidden" name="rest_id" value="{{ $image->restaurante->id }}" />
                                    <textarea class="form-control" name="comentario" required></textarea>
                                    @if ($errors->has('comentario'))
                                        <span class="alert-danger" role="alert">
                                            <strong>{{ $errors->first('comentario') }}</strong>
                                        </span>

                                    @endif
                                    <input type="submit" class="btn btn-success coment-bt" value="ENGADIR" />
                                </form>
                                <!--Vamos a listar los comentarios -->
                                @foreach ($image->comentarios as $coment)
                                    <div class="comentarios">
                                        <span class="nick">{{ '@' . $coment->user->nick }}</span>
                                        <span class="fecha">
                                            {{ ' | ' . \FormatTime::LongTimeFilter($coment->created_at) }}</span>
                                        <p>{{ $coment->contenido }}</p>
                                        <!-- SOLO CUANDO ESTEMOS IDENTIFCADOS LA MISMA CONDICION Q EN EL CONTROLADOR  y tenemos el objeto auth con check me dice si esta o no-->
                                        @if (Auth::check() && ($coment->user_id == Auth::user()->id || $coment->imagen->user_id == Auth::user()->id))
                                            <a class="eliminar "
                                                href="{{ route('comentario.borrar', ['id' => $coment->id]) }}">
                                                BORRAR </a>
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="limpiar"></div>
                    </div>


                </div>
            </div>
        </div>
    @endsection
