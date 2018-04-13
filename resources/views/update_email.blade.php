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
            <li><a class="select2" href=""><img src="{{ asset('Imagenes/update.svg') }}" class="icono">Actualizar</a></li>
            <li><a href=""><img src="{{ asset('Imagenes/email.svg') }}" class="icono">Contactanos</a></li>
        </div>
        <li><a href="{{ route('logout') }}"><img src="{{ asset('Imagenes/salir.svg') }}" class="icono">Salir</a></li>
    @endsection

    @section('body')
        @section('content')
            <form id="cambio_contraseña" method="POST" action="{{ route('password.request') }} " autocomplete="off">
                {{ csrf_field() }}
                
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}" id="email">
                
                <div id="titulo_trans">Actualizar su contraseña</div>
                <div class="row">
                    <div class="div_actualizar_correo col-xs-12 col-sm-12 col-md-5 col-lg-3">
                        <p>Ingrese su contraseña actual</p><br>
                        <input id="password" type="password" class="form-control" onclick="eliminar_error(3)"/><br>
                        <div id="error_password"></div>
                        <p>Ingrese su nueva contraseña</p><br>
                        <input id="password-confirm" type="password" class="form-control" onclick="eliminar_error(4)" name="password"/><br>
                        <p>Verifique su nueva contraseña</p>
                        <input id="password-confirm-2" type="password" class="form-control" onclick="eliminar_error(4)" name="password_confirmation"/>
                        <div id="error_password_2"></div>
                       <input type="submit" class="action-button1" value="Enviar"/>
                    </div>
                </div>
            </form>

            <div id="cambio_datos" class="ocultar">
                <img src="Imagenes/confirmar.svg" width="200">
                <p>Hemos cambiado su contraseña con éxito</p>
            </div>
        @endsection
    @endsection



