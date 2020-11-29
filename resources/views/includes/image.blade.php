<div class="card publicacion">
    <div class="card-header">
        @if ($image->user->image)
            <div class="avatar_contenedor">
                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar" />
            </div>
        @endif
        <div class="contenido">
            <a href="{{ route('perfil', ['id' => $image->user->id]) }}">
                {{ $image->user->name }}
                <span class="nick"> {{ '| @' . $image->user->nick }}</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="imagen-contenido">
           <a href="{{ route('image.detalle', ['id' => $image->id]) }}"> <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
        </a>
        </div>
        <div class="restaurante">
            <span class"rest">{{ $image->restaurante->nombre }}</span>
        </div>
    </div>
    <div class="descripcion">
        <span class="nick">{{ '@' . $image->user->nick }}</span>
        <span class="fecha"> {{ ' | ' . \FormatTime::LongTimeFilter($image->created_at) }}</span>
        <p> {{ $image->descripcion }} </p>
    </div>



    <div class="gustas">

        <!-- Comprobar si el usuario le dio like a la imagen -->
        <?php $user_like = false; ?>
        @foreach ($image->likes as $like)
            @if ($like->user->id == Auth::user()->id)
                <?php $user_like = true; ?>
            @endif
        @endforeach

        @if ($user_like)
            <img src="{{ asset('imagenes/up.jpg') }}" data-id="{{ $image->id }}" class="btn-like" />

        @else
            <img src="{{ asset('imagenes/down.jpg') }}" data-id=" {{ $image->id }}" class="btn-dislike" />
        @endif

        <span class="number_likes">{{ count($image->likes) }}</span>
    </div>
    <div class="comentarios">

        <a href="{{ route('image.detalle', ['id' => $image->id]) }}" class="btn comentarios"> Comentarios (
            {{ count($image->comentarios) }} )</a>
    </div>
</div>
