@extends('layouts.app')

@section('content')

    <!--div class="row justify-content-end align-items-center "-->
    <div class="row fondo">
      
        <div class="col-sm-4 logear">
            <div class="card shadow-lg ">
                <div class="card-body ">

                    <div class="card-body " style="padding:10px;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row  ">


                                <div class="col-md-12 ">
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">

                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="contrasinal"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Lembrar') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-success btn-block">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Esqueceches a contrasinal?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
          <div class="col-8  desaparecer">
            <div class="abs-center">
                <h1> A tua rede social para compartir os teus recunchos e coñecer os mellores bares</h1>
                <a id="boton_seccion1" href="">Os nosos bares</a>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
