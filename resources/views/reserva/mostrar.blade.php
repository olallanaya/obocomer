@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}

            </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="titulo text-center">
                    <h1>RESERVAS</h1>

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                 <th>HORARIO</th>
                                <th>COMENSALES</th>
                                <th>COMENTARIOS</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($reservas as $res)

                                <tr>
                                    <td> <a
                                            href="{{ route('perfil', ['id' => $res->user->id]) }}">{{ $res->user->name }}</a>
                                    </td>
                                    <td> {{ $res->fecha }} </td>
                                    <td> {{ $res->hora }} </td>
                                    <td> {{ $res->horario }} </td>
                                    <td> {{ $res->numero }} </td>
                                    <td> {{ $res->comentarios }} </td>

                                </tr>



                                </div>
                            

                                @endforeach

            </div>


        </div>




    </div>
    <div class="clearfix"></div>


    </div>
    </div>
@endsection
