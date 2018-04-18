<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>YeiWallet - @yield('title')</title>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scroll_formulario.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src= "{{ asset('js/validar.js') }}"></script>

</head>
<body>
    @include("layaouts.plantilla_header")
    @include("layaouts.plantilla_ventana")  
    @include("layaouts.navbar")
    @yield("body")
</body>



 <!-- JS -->
    <script src= "{{ asset('js/jquery.js') }}"></script>
    <script src= "{{ asset('js/puntos.js') }}"></script>
    <script src= "{{ asset('js/aos.js') }}"></script>
    <script src= "{{ asset('js/Footer.js') }}"></script>
    <script src= "{{ asset('js/menu_icon.js') }}"></script>
    <script src= "{{ asset('js/scroll_inicio.js') }}"></script>
    <script src= "{{ asset('js/velocity.min.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
 

</html>