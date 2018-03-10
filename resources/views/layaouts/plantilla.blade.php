<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>YeiWallet - @yield('title')</title>
    <link href="{{ asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('css/Footer.css') }}" rel="stylesheet">

</head>

<body>


        <div class="body">
            <div class="wrapper">
                @yield("body")
            </div>
        </div>


        @include("layaouts.plantilla_footer")


        <!-- JS -->
        <script src= "{{ asset('js/jquery.js') }}"></script>
        <script src= "{{ asset('js/puntos.js') }}"></script>
        <script src= "{{ asset('js/aos.js') }}"></script>
        <script src= "{{ asset('js/Footer.js') }}"></script>
        <script src= "{{ asset('js/scroll_inicio.js') }}"></script>
        <script src= "{{ asset('js/velocity.min.js') }}"></script>


        <!-- ACTIVAR ANIMACIONES -->
        <script>espacio.init("white");</script>
        <script>AOS.init();</script>
        <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>