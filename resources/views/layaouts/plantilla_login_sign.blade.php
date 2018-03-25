
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YeiWallet - @yield('title')</title>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scroll_formulario.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{asset('js/validar.js')}}"></script>
    <script src="{{asset('js/validar_persona.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="body_login_sign">
    @yield('body')

    <script src= "{{ asset('js/jquery.js') }}"></script>
    <script src= "{{ asset('js/jquery.easy.js') }}"></script>
    <script src= "{{ asset('js/multi_form.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
    <script src= "{{ asset('refresh.js') }}"></script>
</body>
</html>
