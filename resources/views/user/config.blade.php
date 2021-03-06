@extends('layouts.app')

@section('content')
    <div class="row fondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card cardmargen">
                        <div class="card-header cabeza">{{ __('Configuracion ') }}</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">

                                    <div class="col-md-8">
                                        <input id="nick" type="text"
                                            class="form-control @error('nick') is-invalid @enderror" name="nick"
                                            value="{{ Auth::user()->nick }}" required autocomplete="nick" autofocus>

                                        @error('nick')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ Auth::user()->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row justify-content-center">

                                    <div class="col-md-8">
                                        <input id="direccion" type="text" class="form-control" name="direccion"
                                            value="{{ Auth::user()->direccion }}">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">

                                    <div class="col-md-8">
                                        <input id="localidad" type="text" class="form-control" name="localidad"
                                            value="{{ Auth::user()->localidad }}">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">


                                    <div class="col-md-8">
                                        <select id="provincia" class="form-control" name="provincia">
                                            <option selected value={{ Auth::user()->provincia }}>
                                                {{ Auth::user()->provincia }}
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
                                <div class="form-group row justify-content-center">



                                    <div class="col-md-8">
                                        @include('includes.avatar')
                                        <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <hr>
                                <div class="form-group row mb-0 justify-content-center">
                                    <div class="col-md-6 offset-md-12 ">
                                        <button type="submit" class="btn btn-outline-success btn-block">
                                            {{ __('Gardar cambios') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
