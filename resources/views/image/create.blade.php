@extends('layouts.app')

@section('content')
 @inject('rest', 'App\Restaurante')
<div class="row fondo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!--vamos a crear solo una vista para la subida de la imagen-->
                <div class="card" style="margin-top:40px">
                    <div class="card-header cabeza"> Engade unha nova imaxe
                    </div>

                    <div class="card-body" >
                        <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                            @csrf
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
                                <label for="descripcion" class="col-md-3 col-form-label text-md-right ">Descripcion</label>
                                <div class="col-md-7">
                                    <textarea id="descripcion" name="descripcion" class="form-control" required> </textarea>
                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>

                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                                <label for="restaurante" class="col-md-3 col-form-label text-md-right ">Bar</label>
                             <div class="col-md-6">
                                    <select id="restaurante" name="restaurante" class="form-control{{ $errors->has('rest_id') ? ' is-invalid' : '' }} requiered">
                                        @foreach($rest->get() as $index => $rest)
                                            <option value="{{ $index+1 }}" {{ old('rest_id') == $index ? 'selected' : '' }}>
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


                            <div class="form-group row justify-content-center">

                                <div class="col-md-7">
                                    <input type="submit" class="btn btn-outline-success btn-block" value="Subea" />

                                </div>
                            </div>

                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
