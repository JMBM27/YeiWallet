<!doctype html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>
        YeiWallet - @yield('title')
    </title>

    <link href="{{ asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <script src= "{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/validar.js')}}"></script>


</head>
    @include("layaouts.plantilla_header")
    @include("layaouts.navbar")
<body>
    @yield ('body')

    <script>
            $(document).ready(function () {
                    $('#cambio_contraseña').on('submit', function (e) {
                        var enviar = validar_actualizacion_password();
                        e.preventDefault();
                        if (enviar) {
                            $.ajax({
                                url: $(this).attr('action') || window.location.pathname,
                                type: "GET",
                                data: $(this).serialize(),
                                success: function (data) {
                                    $("#cambio_contraseña").hide();
                                    $("#cambio_datos").show();
                                },
                                error: function (jXHR, textStatus, errorThrown) {
                                    alert(errorThrown);
                                }
                            });
                        }
                    });
            });

    </script>
    
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>