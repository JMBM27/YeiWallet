<?php
$isAddressBtc = App\AddressBtc::exists(Auth::user()->id);
$isAddressLtc = App\AddressLtc::exists(Auth::user()->id);
$isAddressDoge=App\AddressDoge::exists(Auth::user()->id);
?>

@extends("layaouts.contenido_dashboard")

    @section("title")
        Wallet
    @endsection

    @section("header")
    @endsection

    @section("menu")
        <li><a href="{{ route('dashboard') }}"><img src="{{ asset('Imagenes/home.svg') }}" class="icono">Inicio</a></li>
        <?php if(strcmp($opcion,'send')==0){ ?>
        <li class="select"><a href="{{ route('select.wallet.send') }}" onclick="enviar_dinero();"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Enviar</a></li>
        <li><a href="{{ route('select.wallet.history') }}"><img src="{{ asset('Imagenes/historial.svg') }}" class="icono">Historial</a></li>
        <?php } else {?>
        <li><a href="{{ route('select.wallet.send') }}" onclick="enviar_dinero();"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Enviar</a></li>
        <li class="select"><a href="{{ route('select.wallet.history') }}"><img src="{{ asset('Imagenes/historial.svg') }}" class="icono">Historial</a></li>
        <?php } ?>
        <li><a data-toggle="collapse" href="#collapse1" href=""><img src="{{ asset('Imagenes/configuracion.svg') }}" class="icono">Configuración</a></li>
        <div id="collapse1" class="panel-collapse collapse">
            <li><a href=""><img src="{{ asset('Imagenes/update.svg') }}" class="icono">Actualizar</a></li>
            <li><a href=""><img src="{{ asset('Imagenes/email.svg') }}" class="icono">Contactanos</a></li>
        </div>
        <li><a href="{{ route('logout') }}"><img src="{{ asset('Imagenes/salir.svg') }}" class="icono">Salir</a></li>
    @endsection

    @section("redirect")
        {{ route('select.wallet') }}
    @endsection
    

    @section("body")
        @section("content")
            <div id="titulo_trans" class=" col-col-md-12">
                Selecciona tu Wallet
            </div>

            <div class="dash">
                <div class="row">
                    <?php if($isAddressBtc){ ?>
                    <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <a class="wallet-select" href=" @yield('redirect') " onclick="event.preventDefault(); document.getElementById('btc-form').submit();">
                            <div class="div_btc_titulo">
                                Bitcoin
                            </div>
                            <div class="div_btc_body" id="r_btc">
                                <p>$<?php //echo $precio; ?></p>
                                <img src="{{ asset('/Imagenes/bitcoin.png') }}" height="50" width="50"/>
                            </div>
                        </a>

                        <form id="btc-form" action="@yield('redirect')" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="wallet" value="btc"/>
                            <input type="hidden" name="opcion" value="<?php echo $opcion; ?>"/> 
                        </form>
                    </div>
                    <?php } if($isAddressLtc){ ?>
                    <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <a class="wallet-select" href=" @yield('redirect') " onclick="event.preventDefault(); document.getElementById('ltc-form').submit();">
                            <div class="div_eth_titulo">
                                Litecoin
                            </div>
                            <div class="div_btc_body" id="r_btc">
                                <p>$<?php //echo $precio; ?></p>
                                <img src="{{ asset('/Imagenes/bitcoin.png') }}" height="50" width="50"/>
                            </div>
                        </a>

                        <form id="ltc-form" action="@yield('redirect')" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="wallet" value="ltc"/>
                            <input type="hidden" name="opcion" value="<?php echo $opcion; ?>"/> 
                        </form>
                    </div>
                    <?php } if($isAddressDoge){ ?>
                    <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <a class="wallet-select" href=" @yield('redirect') " onclick="event.preventDefault(); document.getElementById('doge-form').submit();">
                            <div class="div_trans_titulo">
                                Dogecoin
                            </div>
                            <div class="div_btc_body" id="r_btc">
                                <p>$<?php //echo $precio; ?></p>
                                <img src="{{ asset('/Imagenes/bitcoin.png') }}" height="50" width="50"/>
                            </div>
                        </a>

                        <form id="doge-form" action="@yield('redirect')" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="wallet" value="doge"/>
                            <input type="hidden" name="opcion" value="<?php echo $opcion; ?>"/> 
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
        @endsection
    @endsection








