<!doctype html>
<html lang="en">

    <body>

           <div class="row">
        <div class="div_izq_dashboard col-xs-12 col-sm-3 col-md-3 col-lg-2">
            <nav class="nav_dashboard">
                <ul>
                    <li><a href=""><img src="Imagenes/home.svg" class="icono">Inicio</a></li>
                    <li><a href=""><img src="Imagenes/send.svg" class="icono">Enviar</a></li>
                    <li><a href=""><img src="Imagenes/historial.svg" class="icono">Historial</a></li>
                    <li><a href=""><img src="Imagenes/configuracion.svg" class="icono">Configuración</a></li>
                    <li><a href=""><img src="Imagenes/salir.svg" class="icono">Salir</a></li>
                </ul>
            </nav>
        </div>

            <div class="div_der_dashboard col-xs-12 col-sm-9 col-md-9 col-lg-10">
                @yield("content")
                <script src="{{ asset('js/checked.js') }}"></script>
            </div>

        </div>
    </body>
</html>