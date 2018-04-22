
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
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/validar.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

@include('layaouts.plantilla_ventana')

<body class="body_login_sign">
    @yield('body')

    <script src= "{{ asset('js/jquery.js') }}"></script>
    <script src= "{{ asset('js/jquery.easy.js') }}"></script>
    <script src= "{{ asset('js/multi_form.js') }}"></script>
    <script src= "{{ asset('js/bootstrap.min.js') }}"></script>
    <script src= "{{ asset ('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src= "{{ asset ('js/bootstrap-datetimepicker.es.js')}}"></script>
    <script src= "{{ asset('refresh.js') }}"></script>


    <script>
        var dt = new Date();
        dt.setFullYear(new Date().getFullYear() - 18);
        $('.form_date').datetimepicker({
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




</body>
</html>
