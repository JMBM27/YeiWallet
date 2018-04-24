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
    <link href="{{ asset('css/bootstrap/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <script src= "{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/validar.js')}}"></script>




</head>
<body>
    @include("layaouts.plantilla_header")
    @include("layaouts.plantilla_header_dashboard")
    @include("layaouts.navbar")
    @yield ('body')

    
 <!--   <script src= "{{ asset('js/menu_icon.js') }}"></script>
--> <script src= "{{ asset('js/jquery.js') }}"></script>
    <script src= "{{ asset('js/jquery.easy.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
    <script src= "{{ asset ('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src= "{{ asset ('js/bootstrap-datetimepicker.es.js')}}"></script>

    
    <script>
        var dt = new Date();
        $('#fecha_1').datetimepicker({
            viewMode: "years",
            endDate: dt,
            language:  'es',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    </script>
    
    <script>
        var dt = new Date();
        $('#fecha_2').datetimepicker({
            viewMode: "years",
            endDate: dt,
            language:  'es',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            next: 'Imagenes/bitlogo.svg'
        });
    </script>


   
    <!-- JS -->
    <script src= "{{ asset('js/menu_icon.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
