<footer class="my-5 pt-5 text-muted text-center text-small border-top">
    @if (session()->has('username'))
    <p class="mb-1">Hello, {{Session::get('username')}}, have a nice day!</p>
        @else
        <p class="mb-1">Galiaskarov Ilyas & Ibrayev Daniyar</p>
    @endif
    <ul class="list-inline">
        <li class="list-inline-item"><a href="https://github.com/dan-ibm/students-employment/">Github Link</a></li>
    </ul>
</footer>
