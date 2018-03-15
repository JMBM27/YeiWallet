<!doctype html>
<html lang="en">

    <body>

    <div class="row">
        <div class="div_izq_dashboard col-xs-12 col-sm-3 col-md-3">
            <nav class="nav_dashboard">
                <ul>
                    <img src="Imagenes/LOGO1.1.svg" width="30" alt="User-photo" align="center">
                    {{ Auth::user()->usuario }}
                    <li><a href=""><span></span>Tus Wallets</a></li>
                    <li><a href=""><span></span>Enviar</a></li>
                    <li><a href=""><span></span>Historial</a></li>
                    <li><a href=""><span></span>Configuración</a></li>
                    <li><a href="{{ route('logout') }}">Salir</a></li>
                </ul>
            </nav>
        </div>

        <div class="div_der_dashboard col-xs-12 col-sm-9 col-md-9">
            @yield("content")
        </div>
    </div>

    </body>
</html>