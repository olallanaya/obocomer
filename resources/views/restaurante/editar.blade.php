@extends('layouts.app')

@section('content')
    <div class="row fondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header cabeza">{{ __('Modificar bar ') }}</div>

                        <div class="card-body ">

                            <form method="POST" action="{{ route('restaurante.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="rest_id" value="{{ $restaurante->id }}" />

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">

                                            <label for="name" class="col-md-3 col-form-label text-md-right">Nome</label>
                                            <div class="col-md-9">
                                                <input id="name" name="name" type="text"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    required value="{{ $restaurante->nombre }}">

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                                            <div class="col-md-9">
                                                <input id="email" type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ $restaurante->email }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="telefono"
                                                class="col-md-3 col-form-label text-md-right">Telefono</label>
                                            <div class="col-md-9">
                                                <input id="telefono" type="text" class="form-control" name="telefono"
                                                    value="{{ $restaurante->telefono }}">
                                                @if ($errors->has('telefono'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('telefono') }}</strong>
                                                    </span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="direccion"
                                                class="col-md-3 col-form-label text-md-right">Direccion</label>
                                            <div class="col-md-9">
                                                <input id="direccion" type="text" class="form-control" name="direccion"
                                                    value="{{ $restaurante->direccion }}">
                                                @if ($errors->has('direccion'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('direccion') }}</strong>
                                                    </span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="localidad"
                                                class="col-md-3 col-form-label text-md-right">Localidad</label>
                                            <div class="col-md-9">
                                                <input id="localidad" type="text" class="form-control" name="localidad"
                                                    value="{{ $restaurante->localidad }}">
                                                @if ($errors->has('localidad'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('localidad') }}</strong>
                                                    </span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="provincia"
                                                class="col-md-3 col-form-label text-md-right">Provincia</label>
                                            <div class="col-md-9">
                                                <select id="provincia" class="form-control" name="provincia">
                                                    <option selected value="{{ $restaurante->provincia }}" "> {{ $restaurante->provincia }}
                                                                                                </option>
                                                                                                <option value='alava'>Álava</option>
                                                                                                <option value='albacete'>Albacete</option>
                                                                                                <option value='alicante'>Alicante/Alacant</option>
                                                                                                <option value='almeria'>Almería</option>
                                                                                                <option value='asturias'>Asturias</option>
                                                                                                <option value='avila'>Ávila</option>
                                                                                                <option value='badajoz'>Badajoz</option>
                                                                                                <option value='barcelona'>Barcelona</option>
                                                                                                <option value='burgos'>Burgos</option>
                                                                                                <option value='caceres'>Cáceres</option>
                                                                                                <option value='cadiz'>Cádiz</option>
                                                                                                <option value='cantabria'>Cantabria</option>
                                                                                                <option value='castellon'>Castellón/Castelló</option>
                                                                                                <option value='ceuta'>Ceuta</option>
                                                                                                <option value='ciudadreal'>Ciudad Real</option>
                                                                                                <option value='cordoba'>Córdoba</option>
                                                                                                <option value='cuenca'>Cuenca</option>
                                                                                                <option value='girona'>Girona</option>
                                                                                                <option value='laspalmas'>Las Palmas</option>
                                                                                                <option value='granada'>Granada</option>
                                                                                                <option value='guadalajara'>Guadalajara</option>
                                                                                                <option value='guipuzcoa'>Guipúzcoa</option>
                                                                                                <option value='huelva'>Huelva</option>
                                                                                                <option value='huesca'>Huesca</option>
                                                                                                <option value='illesbalears'>Illes Balears</option>
                                                                                                <option value='jaen'>Jaén</option>
                                                                                                <option value='acoruña'>A Coruña</option>
                                                                                                <option value='larioja'>La Rioja</option>
                                                                                                <option value='leon'>León</option>
                                                                                                <option value='lleida'>Lleida</option>
                                                                                                <option value='lugo'>Lugo</option>
                                                                                                <option value='madrid'>Madrid</option>
                                                                                                <option value='malaga'>Málaga</option>
                                                                                                <option value='melilla'>Melilla</option>
                                                                                                <option value='murcia'>Murcia</option>
                                                                                                <option value='navarra'>Navarra</option>
                                                                                                <option value='ourense'>Ourense</option>
                                                                                                <option value='palencia'>Palencia</option>
                                                                                                <option value='pontevedra'>Pontevedra</option>
                                                                                                <option value='salamanca'>Salamanca</option>
                                                                                                <option value='segovia'>Segovia</option>
                                                                                                <option value='sevilla'>Sevilla</option>
                                                                                                <option value='soria'>Soria</option>
                                                                                                <option value='tarragona'>Tarragona</option>
                                                                                                <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                                                                                                <option value='teruel'>Teruel</option>
                                                                                                <option value='toledo'>Toledo</option>
                                                                                                <option value='valencia'>Valencia/Valéncia</option>
                                                                                                <option value='valladolid'>Valladolid</option>
                                                                                                <option value='vizcaya'>Vizcaya</option>
                                                                                                <option value='zamora'>Zamora</option>
                                                                                                <option value='zaragoza'>Zaragoza</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                     <div class=" form-group">
                                                        <label for="descripcion"
                                                            class="col-md-3 col-form-label">Descripcion</label>
                                                        <div class="col-md-12">
                                                            <textarea id="descripcion" name="descripcion"
                                                                class="form-control" required
                                                                value="$restaurante->descripcion"> </textarea>
                                                            @if ($errors->has('descripcion'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                                                </span>

                                                            @endif
                                                        </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image"
                                                            class="col-md-4 col-form-label">Imaxen</label>
                                                        <div class="col-md-8">
                                                            <div class="container-avatar">
                                                                <img src="{{ route('restaurante.imagen', ['filename' => $restaurante->image]) }}"
                                                                    class="avatar" />
                                                            </div>
                                                   <input id="image" type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" />
                                                            @if ($errors->has('image'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('image') }}</strong>
                                                                </span>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="menu"
                                                            class="col-md-4 col-form-label">Sube a tu
                                                            carta</label>

                                                        <div class="col-md-8">
                                                            <div class="container-avatar">
                                                                <img src="{{ route('restaurante.imagen', ['filename' => $restaurante->menu]) }}"
                                                                    class="avatar" />
                                                            </div>
                                                        <input id="menu" type="file" name="menu" class="form-control {{ $errors->has('menu') ? 'is-invalid' : '' }}" />
                                                            @if ($errors->has('menu'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('menu') }}</strong>
                                                                </span>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">

                                                <div class="col-md-7">
                                                    <input type="submit" class="btn btn-outline-success btn-block"
                                                        value="Subea" />

                                                </div>
                                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        @endsection
