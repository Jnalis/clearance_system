<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NSCS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="{{ asset('style/styles.css') }}" rel="stylesheet">

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('dist/img/nit.png') }}" sizes="114x114">

</head>
<body>
    <div id="app">
        
        <main class="mt-2">
            @yield('content')
        </main>
        
        @yield('showHiddenDiv')
    </div>

</body>
</html>
