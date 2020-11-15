@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!--vamos a crear solo una vista para la subida de la imagen-->
        <div class="card">
        <div class="card-header"> Engade unha nova imaxe
        </div>
      
        <div class="card-body">
        <form method="POST" action="{{route('image.save')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-group row">
            <label for="image_path" class="col-md-3 col-form-label text-md-right ">Imaxen</label>
            <div class="col-md-7">
                <input id="image_path" type="file" name="image_path" class="form-control" required/>
                @if($errors->has('image_path'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('image_path')}}</strong>
                </span>

                @endif
            </div>  
        </div>
            <div class="form-group row">
                <label for="descripcion" class="col-md-3 col-form-label text-md-right ">Descripcion</label>
                <div class="col-md-7">
                    <textarea id="descripcion" name="descripcion" class="form-control" required> </textarea>
                    @if($errors->has('descripcion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$errors->first('descripcion')}}</strong>
                    </span>
    
                    @endif
                </div>  
          </div>
          <div class="form-group row">
          
            <div class="col-md-7 offset-md-5">
                <input type="submit"  class="btn btn-success coment-bt"  value="Subea"/>
               
            </div>  
      </div>
        </div>


        </form>
       </div>
        </div>
    </div>
</div>

@endsection