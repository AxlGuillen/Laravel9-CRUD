@extends('layaouts\app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">Editar Noticia</h1>
    <form method="POST" action="{{ route('news.update', $newsItem->id) }}" class="w-full max-w-lg">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Título</label>
                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="title" name="title" value="{{ $newsItem->title }}" required>
            </div>
            <div class="w-full px-3">
                <label for="resume" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Resumen</label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="resume" name="resume" rows="3" required>{{ $newsItem->resume }}</textarea>
            </div>
            <div class="w-full px-3">
                <label for="author" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Autor</label>
                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="author" name="author" value="{{ $newsItem->author }}" required>
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar Noticia</button>
        <a href="{{ route('news.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>
</div>
@endsection
