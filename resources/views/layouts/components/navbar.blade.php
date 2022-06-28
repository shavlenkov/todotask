<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TodoTask</a>
        <ul class="nav d-flex">
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tasks.active') }}">
                        {{ Auth::user()->getNameAndSurname() }}
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('get.logout') }}">Вийти</a></li>
            @else
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('get.signup') }}">Зареєструватись</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{ route('get.signin') }}">Увійти</a></li>
            @endif
        </ul>
    </div>
</nav>
