@extends('layaouts\app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">Noticias</h1>
    @auth
        <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Noticia</a>
    @endauth
    <div class="mt-3">
        <ul class="list-disc">
            @foreach ($news as $new)
                <li class="mt-2 p-3 shadow-md rounded">
                    {{ $new->title }} - <small>{{ $new->author }}</small>
                    <a href="{{ route('news.show', $new->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs ml-2">Ver</a>

                    @auth
                        <a href="{{ route('news.edit', $new->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-xs">Editar</a>
                    <a href="{{ route('news.destroy', $new->id) }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs"
                    onclick="event.preventDefault(); if(confirm('¿Estás seguro de querer eliminar esta noticia?')) this.nextElementSibling.submit();">
                        Eliminar
                    </a>
                    <form action="{{ route('news.destroy', $new->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-600">Eliminar</button>
                    </form>
                    @endauth
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
