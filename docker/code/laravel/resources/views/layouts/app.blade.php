<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <p><a href="{{ route('Users.register')}}">register</a></p>
        <p><a href="{{ route('Users.login') }}">login</a></p>
        <p><a href="{{ route('Users.logout')}}">logout</a></p>
    </div>
    <div id="app">
        <main class="py-4 container">
            <h3 class="text-center">@yield('h3')</h3>
            <div class="container" >
                @if ((session('error')))
                    <p style="color: red;">{{ (session('error')) }}</p>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
