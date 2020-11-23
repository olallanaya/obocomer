@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="titulo text-center"> Meus likes</h1>


                @foreach ($likes as $like)

                    @include('includes.image',['image'=>$like->imagen])

                @endforeach
                <div class="limpiar"></div>
                {{ $likes->links() }}
            </div>

        </div>
    @endsection
