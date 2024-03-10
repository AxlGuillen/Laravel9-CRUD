@extends('layaouts\app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">{{ $newsItem->title }}</h1>
    <p class="mb-4">{{ $newsItem->resume }}</p>
    <p class="text-sm font-light mb-4 text-end">Autor: {{ $newsItem->author }}</p>
    <a href="{{ route('news.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Volver a la lista</a>
</div>
@endsection
