<!doctype html>
<html lang="en">
<head>
    <title>
        @yield('title')
    </title>

    <link href="{{ asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">


</head>

    @include("layaouts.plantilla_header")
    @include("layaouts.navbar")
<body>
    @yield ('body')


    <script src= "{{ asset('js/jquery.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>