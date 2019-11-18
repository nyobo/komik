<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/landing-page/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/js/chart/dist/Chart.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    {{-- <link href="{{ asset('vendor/landing-page/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{ asset('vendor/landing-page/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="{{ asset('vendor/landing-page/css/landing-page.min.css') }}" rel="stylesheet"> --}}

  </head>

  @include('frontend.layout.navbar')
  <body>
  <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
      @include('frontend.layout.banner')
      @include('frontend.layout.pemisah')
      @include('frontend.keahlian')
      @include('frontend.layout.pemisah')
      @include('frontend.tentang')
      @include('frontend.layout.pemisah')
      @include('frontend.layout.scripts')
  </div>
  </body>
</html>