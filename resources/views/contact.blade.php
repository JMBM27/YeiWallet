@extends("layaouts.contenido_dashboard")


    @section('title')
        Configuración
    @endsection

    @section('header')
    @endsection

    @section("menu")
        <li><a href="{{ route('dashboard') }}"><img src="{{ asset('Imagenes/home.svg') }}" class="icono">Inicio</a></li>
        <li><a href="{{ route('select.wallet.send') }}" onclick="enviar_dinero();"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Enviar</a></li>
        <li><a href="{{ route('select.wallet.history') }}"><img src="{{ asset('Imagenes/historial.svg') }}" class="icono">Historial</a></li>
        <li><a class="select" data-toggle="collapse" href="#collapse1" href=""><img src="{{ asset('Imagenes/configuracion.svg') }}" class="icono">Configuración</a></li>
        <div id="collapse1" class="panel-collapse collapse">
            <li><a href=""><img src="{{ asset('Imagenes/update.svg') }}" class="icono">Actualizar</a></li>
            <li class="selected"><a class="select2" href=""><img src="{{ asset('Imagenes/email.svg') }}" class="icono">Contactanos</a></li>
        </div>
        <li><a href="{{ route('logout') }}"><img src="{{ asset('Imagenes/salir.svg') }}" class="icono">Salir</a></li>
    @endsection

    @section('body')
        @section('content')
            <form id="envio_mensaje" method="post" autocomplete="off" onsubmit="return validar_mensaje();">
                <div id="titulo_trans">Buzon de mensajes</div>
                
                <div class= "row">
                    <div class="div_buzon_msj col-xs-12 col-md-12 col-sm-12 col-md-12">
                    <p>Título</p>
                    <input type="text" id="titulo_msj" class="form-control" onclick="eliminar_error(10);"/>
                    <div id="error_titulo"></div>    
                    <textarea id="redaccion" rows="10" cols="50" class="form-control" name="mensaje" onclick="eliminar_error(11);" style="margin:5px;" form=envio_mensaje></textarea>
                    <div id="error_mensaje"></div>       
                        
                    <input type="submit" class="action-button1" value="Enviar"> 
                </div>  
                </div>
                 
                
            </form>

            <div id="cambio_datos" class="ocultar">
                <img src="Imagenes/confirmar.svg" width="200">
                <p>Su mensaje se ha enviado, nuestros administradores lo contactaran lo mas pronto posible, gracias por utilizar nuestra pagina.</p>
            </div>
        @endsection
    @endsection
