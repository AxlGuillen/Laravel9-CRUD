<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/blog">Blog</a></li>
    {{-- Aqui se usa php plano para poner un enlace a la ruta con el nombre contacto
    blade --}}
    <li><a href="{{ route('about') }}">About</a></li>
    {{-- php plano --}}
    <li><a href="<?= route('contact') ?>">Contacto</a></li>
</ul>
