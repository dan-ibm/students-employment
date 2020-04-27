

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
        <a class="navbar-brand" href="/">Students Employment</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">

            </ul>

            <ul class="navbar-nav ml-auto">
                @if (session()->has('username'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('username')}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/')}}">Home</a>

                        @if(session()->get('role') == 'employer')
                            <a class="dropdown-item" href="{{url('/employers/dashboard')}}">Dashboard</a>
                        @elseif(session()->get('role') == 'student')
                            <a class="dropdown-item" href="{{url('/students/dashboard')}}">Dashboard</a>
                        @elseif(session()->get('role') == 'teacher')
                            <a class="dropdown-item" href="{{url('/teachers/dashboard')}}">Dashboard</a>
                        @endif
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
                @else
                    <li class="nav-item active">
                        <a class="text-white" href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
        </div>
    </nav>









