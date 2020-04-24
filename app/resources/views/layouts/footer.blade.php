<footer class="my-5 pt-5 text-muted text-center text-small border-top">
    @if (session()->has('username'))
    <p class="mb-1">Hello {{Session::get('username')}} read about</p>
        @else
        <p class="mb-1">Galiaskarov Ilyas & Ibrayev Daniyar</p>
    @endif
    <ul class="list-inline">
        <li class="list-inline-item"><a href="">Privacy</a></li>
        <li class="list-inline-item"><a href="">Terms</a></li>
        <li class="list-inline-item"><a href="">Support</a></li>
    </ul>
</footer>
