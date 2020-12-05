@extends('layouts.app')

@section('content')
<div class="row fondo">
    <div class="container >
        <div class="row justify-content-center">
           
            
            <div class="card cardmargen">
                <div class="card-header cabeza">SUBE A TUA FOTO DE AVATAR</div>

                <div class="card-body">
        
                    <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
                        @csrf

                       
                             
                        <div class="form-group row">

                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-7">
                                @include('includes.avatar')
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
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
@endsection
