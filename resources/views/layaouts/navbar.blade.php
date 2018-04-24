<?php
$isAddressBtc = App\AddressBtc::exists(Auth::user()->id);
$isAddressLtc = App\AddressLtc::exists(Auth::user()->id);
$isAddressDoge= App\AddressDoge::exists(Auth::user()->id);
?>
<html lang="en">

    <body>
        <div class="row recortar">
            <div class="div_izq_dashboard col-xs-12 col-sm-3 col-md-3 col-lg-2">
                <nav class="nav_dashboard">
                    <ul>
                        <div class="usuario" style="text-align:center; color:white; margin-top:15px; margin-bottom:15px;">Bienvenid@<br>{{ Auth::user()->usuario }}
                        </div>                                   
                        <li><a class="@yield('opc1')" href="{{ route('dashboard') }}"><img src="{{ asset('Imagenes/home.svg') }}" class="icono">Inicio</a></li>
                        
                        @if(!$isAddressBtc || !$isAddressLtc || !$isAddressDoge)
                            <li><a class="@yield('opc5')" data-toggle="collapse" href="#collapse1" href=""><img src="{{ asset('Imagenes/address.svg') }}" class="icono">Address</a></li>
                            <div id="collapse1" class="collaps panel-collapse collapse">
                                @if(!$isAddressBtc)
                                    <li><a href="{{ route('new.btc') }}"><img src="{{ asset('Imagenes/bit.svg') }}" class="icono">Bitcoin</a></li>
                                @endif
                                @if(!$isAddressLtc)
                                    <li><a href="{{ route('new.ltc') }}"><img src="{{ asset('Imagenes/lite.svg') }}" class="icono">Litecoin</a></li>
                                @endif
                                @if(!$isAddressDoge)
                                    <li><a href="{{ route('new.doge') }}"><img src="{{ asset('Imagenes/doge.svg') }}" class="icono">Dogecoin</a></li>
                                @endif
                            </div>
                        @endif
                        
                        @if($isAddressBtc || $isAddressLtc || $isAddressDoge)
                            <li><a class="@yield('opc2')" href="{{ route('select.wallet.send') }}" onclick="enviar_dinero();"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Enviar</a></li>
                            <li><a class="@yield('opc3')" href="{{ route('select.wallet.history') }}"><img src="{{ asset('Imagenes/historial.svg') }}" class="icono">Historial</a></li>
                        @endif
                        <li><a class="@yield('opc4')" data-toggle="collapse" href="#collapse2"><img src="{{ asset('Imagenes/configuracion.svg') }}" class="icono">Configuración</a></li>
                        <div id="collapse2" class="collaps panel-collapse collapse @yield('v1')">
                            <li><a class="@yield('sub1')" href="{{ route('password.update') }}"><img src="{{ asset('Imagenes/update.svg') }}" class="icono">Actualizar</a></li>
                             <li><a class="@yield('sub3')" href="{{ route('code.config') }}"><img src="{{ asset('Imagenes/code.svg') }}" class="icono">Solicitar Código</a></li>
                            <li><a class="@yield('sub2')" href=""><img src="{{ asset('Imagenes/email.svg') }}" class="icono">Contactanos</a></li>
                        </div>
                        <li><a class="@yield('opc5')" href="{{ route('logout') }}"><img src="{{ asset('Imagenes/salir.svg') }}" class="icono">Salir</a></li>
                    </ul>
                </nav>
            </div>

            <div class="div_der_dashboard col-xs-12 col-sm-12 col-md-9 col-lg-10" id="div_derecho">
                @yield("content")
            </div>
        </div>
    </body>
</html>

    
