@extends("layaouts.contenido_dashboard")


@section('title')
    Configuración
@endsection


 @section('header')
    @section('header_dash')
        @section('menu_nav')
            @include("layaouts.plantilla_navbar")
        @endsection
    endsection
@endsection



@section("opc4")           
    select
@endsection

@section("v1")           
    show
@endsection

@section("sub3")           
    select2
@endsection

@section('body')
    @section('content')
       
        <form id="solicitar_codigo">
            <div id="titulo_trans">
                Solicitar código de transferencia
            </div>
            
            <div class="div_solicitar_codigo col-xs-12 col-sm-12 col-md-12">
            <p> Una vez solicitado el código se le pedira cada vez que quiera realizar una transacción en nuestra página, de otro modo no sera posible el envío de esa transacción, porfavor guarde el código en un lugar donde este seguro. Si esta de acuerdo con lo explicado proceda a solicitarlo.
            </p>
            <input type="submit" class="action-button1" value="Solicitar"/>
            <input type="submit" class="action-button1" disabled="disabled" value="Solicitar"/><br>
            <a data-toggle="modal" href="#ventana_codigo" aria-controls="#cod">He olvidado mi código, envíar de nuevo a mi correo.
                </a>
            </div>
        </form>

        <form id="recuperar_codigo" autocomplete="off" onsubmit="return validar_email();">
            @section('titulo_ventana')
                <h4>Introduzca su correo electrónico</h4>
            @endsection

            @section('body_ventana')
                <input type="email" id="email" class="form-control" name="email" placeholder="Ej: yeiwallet@yeiwallet.com" onclick="eliminar_error(2);">
                <div id="error_email"></div>
            @endsection

            @section('footer_ventana')
                <input type="submit" class="action-button1" value="Enviar"/>
            </form>
            @endsection
            
    @endsection
@endsection