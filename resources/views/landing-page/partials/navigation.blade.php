{{--  @if (Route:has('login'))  --}}
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">Start Bootstrap</a>
        <ul class="navbar-nav mr-auto">
        </ul>
        @auth
            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        @else
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            </li>

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
            </li>
        @endif
        </ul>
        @endauth

    </div>

</nav>
{{--  @endif  --}}

{{--  @if (Route::has('login'))
<div class="top-right links">
    @auth
        <a href="{{ url('/home') }}">Home</a>
    @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
</div>
@endif  --}}
