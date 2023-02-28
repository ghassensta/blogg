<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blogger</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>


<body>
    <style>
        .nav-link {
            color: aliceblue;
            cursor: pointer;
        }
        
        .nav-link:hover {
            color: aliceblue;
        }
        </style>
            @include('layouts.nvbar')
        <div class="">

            <div>


                      @yield('content')

            </div>

            <footer>
                @include('layouts.footer')
            </footer>
</body>
</html>
