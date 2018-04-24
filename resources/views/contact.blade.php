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

@section("sub2")           
    select2
@endsection

@section('body')
    @section('content')
        <form id="envio_mensae" method="POST" action="{{ route('contact.send') }} " autocomplete="off" onsubmit="return validar_mensaje();">
            {{ csrf_field() }}
<<<<<<< HEAD
            <div id="titulo_trans">Buzón de mensajes</div>

            <div class= "row">
                <div class="div_buzon_msj col-xs-12 col-md-12 col-sm-12 col-md-12">
                    <p>Título del mensaje</p>
=======
            <div id="titulo_trans">Buzon de mensajes</div>

            <div class= "row">
                <div class="div_buzon_msj col-xs-12 col-md-12 col-sm-12 col-md-12">
                    <p>Título</p>
>>>>>>> a0494705f0084cb1e449420389dd5a2f03be6f8c
                    <input type="text" id="titulo_msj" class="form-control" onclick="eliminar_error(10);"/>
                    <div id="error_titulo"></div>    
                    <p style="margin-top:10px;">Mensaje</p>
                    <textarea id="redaccion" rows="10" cols="50" class="form-control" name="mensaje" onclick="eliminar_error(11);" style="margin:5px;" form=envio_mensaje></textarea>
                    <div id="error_mensaje"></div>       

                    <input type="submit" class="action-button1" value="Enviar"> 
                </div>  
            </div>
        </form>

        <div id="cambio_datos" class="ocultar">
            <img src="Imagenes/confirmar.svg" width="200">
<<<<<<< HEAD
            <p>Su mensaje se ha enviado, nuestros administradores lo contactaran a su correo electrónico lo mas pronto posible, gracias por utilizar nuestra pagina.</p>
=======
            <p>Su mensaje se ha enviado, nuestros administradores lo contactaran lo mas pronto posible, gracias por utilizar nuestra pagina.</p>
>>>>>>> a0494705f0084cb1e449420389dd5a2f03be6f8c
        </div>
    @endsection
@endsection
