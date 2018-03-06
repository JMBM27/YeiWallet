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
    <link href="{{ asset('css/scroll_formulario.css') }}" rel="stylesheet">
    <script src= "{{ asset('js/validar.js') }}"></script>
</head>

<body>


        <div class="body_login_sign">
            @yield("body")

            <div class="center-block">
                <form action="" method="post" id="hola" autocomplete="off">
                    <fieldset>
                    @yield("ventana_formulario")
                    </fieldset>
                </form>
            </div>
        </div>


        <!-- JS -->
        <script src= "{{ asset('js/jquery.js') }}"></script>
        <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>