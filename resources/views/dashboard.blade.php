<?php
$url = "https://www.bitstamp.net/api/ticker/";
$fgc = file_get_contents($url);
$json = json_decode($fgc, true);
$precio = $json["last"];
$alto = $json["high"];
$alto = number_format($alto,2);
$bajo = $json["low"];
$bajo = number_format($bajo,2);
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

?>


@extends ("layaouts.contenido_dashboard")


        @section('title')
            Dashboard
        @endsection

        @section("header")
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
                           <p>$<?php echo $precio; ?></p>
                        <table class="table">
                            <tr>
                                <th>Precio más alto $<?php echo $alto; ?></th>
                            </tr>
                            <tr>
                                <th>Precio más bajo $<?php echo $bajo; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $fecha; ?></th>
                            </tr>
                         <tr>
                                <th style="color: <?php echo $color?>;"><?php echo $porcentajeCambio; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="div_vent_dash col-xs-12 col-sm-4 col-md-4 col-lg-3">
                   <div class="div_eth_titulo">
                       Ethereum
                   </div>
                    <div class="div_eth_body">
                        <p>$<?php echo $precio; ?></p>
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
                      </table>

                  </div>
                  </div>
              </div>
            @endsection




            <script>
                $('document').ready(function () {
                    refrescar_btc();
                    }
                );

                function refrescar_btc () {
                    $('#r_btc'.load("bitcoin_price.php"), function(){
                        setTimeout(refrescar_btc,5000);
                    });
                }

            </script>
        @endsection

       









