<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <!-- Links -->

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/vacancies/all">{{ Session::get('username') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('logout')}}">Logout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

</nav>
