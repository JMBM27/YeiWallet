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
    <link href="{{ asset('css/menu_icon.css') }}" rel="stylesheet">
    <script src= "{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/validar.js')}}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>


</head>
<body>
    @include("layaouts.plantilla_header")
    @include("layaouts.plantilla_header_dashboard")
    @include("layaouts.navbar")
    @yield ('body')
<<<<<<< HEAD
=======
    
         <script>
        $('#enviar_btc').click(function(){
            var enviar = validar_transferencia();
            if (!enviar){
               $('#ventana_codigo').modal("hide");
             }
            else{
                 $('#ventana_codigo').modal("show");
            }
        });     
    </script>
   
    <!-- JS -->
    <script src= "{{ asset('js/menu_icon.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
    
>>>>>>> 9c88433bd09a195b3eea63ad6d7e62b19f4fb498
</body>
</html>