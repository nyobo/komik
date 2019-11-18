{{--  @if (Route:has('login'))  --}}
<?php
    $home =  config('app.name', 'Laravel');
$navbar = [
    '1'=>[
        'url'=>'/',
        'name'=>$home
    ],
    '2'=>[
        'url'=>'jadwal-harian',
        'name'=>'Jadwal Harian',
    ],
    '3'=>[
        'url'=>'genre',
        'name'=>'Genre',
    ],
    '4'=>[
        'url'=>'popular',
        'name'=>'Popular',
    ],
    

];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
        <?php  foreach ($navbar as $nav) {
            print_r(session('nav-active'));
            $active = '';
                if (session('nav-active') == $nav['url']) {
                    $active = 'active';
                }?>
            <ul class="navbar-nav "><a class="nav-link {{ $active }}" href="{{ url($nav['url']) }}">{{ $nav['name'] }}</a></ul>
        <?php }?>
        @auth
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <bottom class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </bottom>
                        <div class="dropdown-menu">
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
                </ul>
                @endguest
            </ul>
        @else
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                @endif
                <a class="fa fa-search"></a>
            </li>
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
