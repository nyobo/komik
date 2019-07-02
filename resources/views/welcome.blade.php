<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('vendor/landing-page/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('vendor/landing-page/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/landing-page/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="{{ asset('vendor/landing-page/css/landing-page.min.css') }}" rel="stylesheet">

    </head>
    <body>
    @if (Route::has('login'))
    @include('landing-page.partials.navigation')
    @endif
	@include('landing-page.partials.masthead')

	@include('landing-page.partials.icons-grid')

	@include('landing-page.partials.image-showcases')

	@include('landing-page.partials.testimonials')

	@include('landing-page.partials.call-to-action')

	@include('landing-page.partials.footer')

	@include('landing-page.partials.scripts')
        {{--  <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
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
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}
    </body>
</html>
