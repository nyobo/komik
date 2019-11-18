<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('frontend\includes\head')
<body>
    <div id="app">
        @include('frontend.includes.navbar')
        <div class="container">
            @include('frontend.includes.messages')
            @yield('content')
        </div>
    </div>
@include('frontend\includes\scripts')
</body>
</html>