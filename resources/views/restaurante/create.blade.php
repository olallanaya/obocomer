@extends('layouts.app')

@section('content')
 <div class="row fondo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header cabeza">{{ __('Un novo bar ') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('restaurante.save') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="nome" name="name" required autocomplete="name" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email" name="email" required autocomplete="email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="telefono"
                                        placeholder="telefono">
                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion"
                                        placeholder="direccion">
                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="localidad" type="text" class="form-control" name="localidad"
                                        placeholder="localidad">
                                    @if ($errors->has('localidad'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('localidad') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <select id="provincia" class="form-control" name="provincia">
                                        <option selected value=" "> Seleccione provincia
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
                            <div class="form-group row">

                                <div class="col-md-7">
                                                                     <textarea id="descripcion" name="descripcion" class="form-control" required  placeholder="Descripción"></textarea>
                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right ">Imaxen</label>
                                <div class="col-md-7">
                                    <input id="image_path" type="file" name="image_path" class="form-control" required />
                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="col-md-3 col-form-label text-md-right ">Sube a tu carta</label>
                                <div class="col-md-7">
                                    <input id="menu" type="file" name="menu" class="form-control" required />
                                    @if ($errors->has('menu'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('menu') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>



                            <hr>
                            <div class="form-group row justify-content-center">

                                <div class="col-md-7">
                                    <input type="submit" class="btn btn-outline-success btn-block" value="Subea" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    @endsection
