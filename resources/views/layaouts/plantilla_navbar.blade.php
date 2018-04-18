<?php
$isAddressBtc = App\AddressBtc::exists(Auth::user()->id);
$isAddressLtc = App\AddressLtc::exists(Auth::user()->id);
$isAddressDoge= App\AddressDoge::exists(Auth::user()->id);
?>

<html lang="en">
    <nav class="nav_dashboard">
        <ul>
            <li><a class="@yield('opc1')" href="{{ route('dashboard') }}"><img src="{{ asset('Imagenes/home.svg') }}" class="icono">Inicio</a></li>
                        
                <?php if(!$isAddressBtc){ ?>
                            <li><a href="{{ route('new.btc') }}"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Address Btc</a></li>
                        <?php } ?>
                        <?php if(!$isAddressLtc){ ?>
                            <li><a href="{{ route('new.ltc') }}"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Address Ltc</a></li>
                        <?php } ?>
                        <?php if(!$isAddressDoge){ ?>
                            <li><a href="{{ route('new.doge') }}"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Address Doge</a></li>
                        <?php } ?>
                        <?php if($isAddressBtc || $isAddressLtc || $isAddressDoge){ ?>
                            <li><a class="@yield('opc2')" href="{{ route('select.wallet.send') }}" onclick="enviar_dinero();"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Enviar</a></li>
                            <li><a class="@yield('opc3')" href="{{ route('select.wallet.history') }}"><img src="{{ asset('Imagenes/historial.svg') }}" class="icono">Historial</a></li>
                        <?php } ?>
                        <li><a class="@yield('opc4')" data-toggle="collapse" href="" data-target="#collapse2"><img src="{{ asset('Imagenes/configuracion.svg') }}" class="icono">Configuración</a></li>
                        <div id="collapse2" class="panel-collapse collapse @yield('v1')">
                            <li><a class="@yield('sub1')" href="{{ route('password.update') }}"><img src="{{ asset('Imagenes/update.svg') }}" class="icono">Actualizar</a></li>
                            <li><a class="@yield('sub3')" href="#"><img src="{{ asset('Imagenes/code.svg') }}" class="icono">Solicitar Código</a></li>
                            <li><a class="@yield('sub2')" href=""><img src="{{ asset('Imagenes/email.svg') }}" class="icono" >Contactanos</a></li>
                        </div>
                        <li><a class="@yield('opc5')" href="{{ route('logout') }}"><img src="{{ asset('Imagenes/salir.svg') }}" class="icono">Salir</a></li>
                    </ul>
       </nav>