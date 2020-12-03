@extends('layouts.app')

@section('content')
    @inject('rest', 'App\Restaurante')
    <div class="row fondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card" style="margin-top:40px">
                        <div class="card-header cabeza"> Reserva mesa
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('reserva.save') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="horario" class="col-md-3 col-form-label text-md-right ">Xornada</label>
                                    <div class="col-md-7">
                                        <select id="horario" name="horario" required class="form-control">
                                            <option value=""'selected'> Escolle </option>
                                            <option value="Mediodia"> Medio-dia </option>
                                            <option value="Noite"> Noite </option>
                                        </select>

                                        @if ($errors->has('horario'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('horario') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fecha" class="col-md-3 col-form-label text-md-right ">Fecha</label>
                                    <div class="col-md-7">
                                        <input type="date" id="fecha" name="fecha" class="form-control" required>
                                        </textarea>
                                        @if ($errors->has('fecha'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fecha') }}</strong>
                                            </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hora" class="col-md-3 col-form-label text-md-right ">Hora</label>
                                    <div class="col-md-7">
                                        <input type="time" id="hora" name="hora" class="form-control" min="13:00" max="23:00" required> </textarea>
                                        @if ($errors->has('hora'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('hora') }}</strong>
                                            </span>

                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="restaurante" class="col-md-3 col-form-label text-md-right ">Bar</label>
                                    <div class="col-md-7">
                                        <select id="restaurante" name="restaurante" required
                                            class="form-control{{ $errors->has('rest_id') ? ' is-invalid' : '' }} ">
                                            <option value=""'selected'> Escolle un bar</option>
                                            @foreach ($rest->get() as $index => $rest)

                                                <option value="{{ $index+1}}">
                                                <option value="{{ $index + 1 }}" {{ old('rest_id') == $index ?: '' }}>
                                                    {{ $rest->nombre }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('rest_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('rest_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="comentarios"
                                        class="col-md-3 col-form-label text-md-right ">Comentarios</label>
                                    <div class="col-md-7">
                                        <textarea id="comentarios" name="comentarios"  placeholder="Pon aqui as tuas suxerencias" class="form-control"
                                           ></textarea>
                                        @if ($errors->has('comentarios'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('comentarios') }}</strong>
                                            </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="numero"
                                        class="col-md-3 col-form-label text-md-right ">Nº de persoas</label>
                                    <div class="col-md-4">
                                        <input type="text" id="numero" name="numero"   class="form-control"/>
                                          
                                        @if ($errors->has('numero'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>

                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-7">
                                        <input type="submit" class="btn btn-outline-success btn-block" value="Subea" />

                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <p class="anotaciones"> *pon nas as observacions as tuas preperencias e mandaremosche un email ca
                                        confirmación</p>
                                </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
