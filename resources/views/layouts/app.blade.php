<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>مجلد الحكمة</title>
    <link rel="icon" href="{!! asset('ddd.jpg') !!}"/>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/lateef.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @yield('css')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <div id="app">

        @include('partials.menu')
        <center><img src="{{ asset('mlk.png') }}" alt="" style="width:300px; height:300px; margin-top: 80px"></center>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('partials.flash')
                </div>
            </div>
        </div>
        @if (Auth::guest())
            @yield('content')
        @else
            @if(Auth::user()->actv)
                @include('partials.blook')
            @else
                @yield('content')
            @endif
        @endif
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @yield('js')

</body>
</html>
