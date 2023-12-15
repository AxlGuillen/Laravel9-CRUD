{{-- Aqui es con componentes de blade no con herencia como en las otras paginas,
     esto se hace refereciando a la variable reservada slot que esta en components/layaout
     Hay dos formas de escribirlo aqui solo dejare 1 y el link al video por si quieres checar algo
     link: https://www.youtube.com/watch?v=w6RHaNycaoo--}}


<x-layouts.app title="Home c:" meta-Description='Descripcion del home'>
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Home</h1>

    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <div>
        Authenticated User: {{ Auth::user()->name }}
    </div>


</x-layouts.app>

