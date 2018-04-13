<?php

$isAddressBtc = App\AddressBtc::exists(Auth::user()->id);
$isAddressLtc = App\AddressLtc::exists(Auth::user()->id);
$isAddressDoge= App\AddressDoge::exists(Auth::user()->id);

/*$url = "http://www.bitstamp.net/api/ticker/";
$opt=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
$fgc = file_get_contents($url,false, stream_context_create($opt));
$json = json_decode($fgc, true);
$precio = $json["last"];
$alto = number_format($json["high"],2);
$bajo = number_format($json["low"],2);
$open = $json["open"];
$fecha = date("d-m-Y - h:i:sa" );

if ($open < $precio){

    $indicador = "+ ";
    $cambio = $precio - $open;
    $porcentaje = $cambio / $open;
    $porcentaje = $porcentaje * 100;
    $porcentajeCambio = $indicador.number_format($porcentaje, 2);
    $color = "green";

}
else{
    $indicador = "- ";
    $cambio = $open - $precio;
    $porcentaje = $cambio / $open;
    $porcentaje = $porcentaje * 100;
    $porcentajeCambio = $indicador.number_format($porcentaje, 2);
    $color = "red";
}
*/
?>

@extends ("layaouts.contenido_dashboard")


        @section('title')
            Dashboard
        @endsection

        @section("header")
        @endsection

        @section("menu")           
            <li class="select"><a href="{{ route('dashboard') }}"><img src="{{ asset('Imagenes/home.svg') }}" class="icono">Inicio</a></li>
            <?php if(!$isAddressBtc){ ?>
                <li><a href="{{ route('new.btc') }}"><img src="Imagenes/send.svg" class="icono">Address Btc</a></li>
            <?php } ?>
            <?php if(!$isAddressLtc){ ?>
                <li><a href="{{ route('new.ltc') }}"><img src="Imagenes/send.svg" class="icono">Address Ltc</a></li>
            <?php } ?>
            <?php if(!$isAddressDoge){ ?>
                <li><a href="{{ route('new.doge') }}"><img src="Imagenes/send.svg" class="icono">Address Doge</a></li>
            <?php } ?>
            <?php if($isAddressBtc || $isAddressLtc || $isAddressDoge){ ?>
                <li><a href="{{ route('select.wallet.send') }}" onclick="enviar_dinero();"><img src="{{ asset('Imagenes/send.svg') }}" class="icono">Enviar</a></li>
                <li><a href="{{ route('select.wallet.history') }}"><img src="{{ asset('Imagenes/historial.svg') }}" class="icono">Historial</a></li>
            <?php } ?>
            <li><a data-toggle="collapse" href="#collapse1" href=""><img src="{{ asset('Imagenes/configuracion.svg') }}" class="icono">Configuración</a></li>
            <div id="collapse1" class="panel-collapse collapse">
                <li><a href=""><img src="{{ asset('Imagenes/update.svg') }}" class="icono">Actualizar</a></li>
                <li><a href=""><img src="{{ asset('Imagenes/email.svg') }}" class="icono">Contactanos</a></li>
            </div>
            <li><a href="{{ route('logout') }}"><img src="Imagenes/salir.svg" class="icono">Salir</a></li>
        @endsection

       
        @section("body")
            @section("content")
                <div id="titulo_trans" class=" col-col-md-12">
                    Dashboard
                </div>

                <div class="dash">
                    <div class="row">
                        <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                            <div class="div_btc_titulo">
                                Bitcoin
                            </div>
                            <div class="div_btc_body" id="r_btc">
                                <p>$<?php //echo $precio; ?></p>
                                <table class="table">
                                    <tr>
                                        <th>Precio más alto $<?php //echo $alto; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Precio más bajo $<?php //echo $bajo; ?></th>
                                    </tr>
                                    <tr>
                                        <th><?php //echo $fecha; ?></th>
                                    </tr>
                                    <tr>
                                        <th style="color: <?php //echo $color?>;"><?php //echo $porcentajeCambio; ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                            <div class="div_eth_titulo">
                                Ethereum
                            </div>
                            <div class="div_eth_body">
                                <p>$<?php //echo $precio; ?></p>
                                <table class="table">
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                            <div class="div_trans_titulo">
                                Últimas transacciones
                            </div>
                            <div class="div_vent_body">
                                <table class="table">
                                    <tr>
                                        <th>Jose Boscan<th>
                                        <th><img src="Imagenes/money-out.svg" class="icono">00001 BTC</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

            <script>
                $("document").ready(function(){
                    setInterval(function(){
                        $("#r_btc").load("{{ asset('precio_bitcoin.php') }}");
                    },10000);
                });
            </script>
        @endsection

       









