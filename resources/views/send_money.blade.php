@extends("layaouts.plantilla_dashboard")

    @section("title")
        Transferir
    @endsection

    @section("header")
    @endsection

    @section("body")
        @section("content")
              <div id="titulo_trans">
                   Transferir <hr>
            </div>

              <h2 style="margin-left: 17px;">Mis wallets</h2>

              <div class="row" id="trans">
                <div class="div_direccion_btc col-sm-12 col-lg-4">
                  <button class="btn-primary" data-toggle="collapse" data-target="#direccion_btc">Bitcoin</button>
                    <div id="direccion_btc" class="collapse">
                        Saldo disponible 0000000001
                        31uEbMgunupShBVTewXjtqbBv5MndwfXhb
                    </div>
              </div>

              <div class="div_direccion_eth col-sm-12 col-lg-4">
                  <button class="btn-primary" data-toggle="collapse" data-target="#direccion_eth">Ethereum</button>
                     <div id="direccion_eth" class="collapse">
                         Saldo Disponible 000000000005
                         31uEbMgunupShBVTewXjtqbBv5MndwfXhb
                      </div>
              </div>
              </div>


              <div class="div_enviar_money col-xs-12 col-sm-12 col-md-12 col-lg-12">

                  <form action="#">
                    <div class="row">

                        <div class="dir_monedero col-xs-12 col-sm-7 col-md-6 col-lg-4">
                            <label>Dirección de la Wallet</label>
                            <input class="form-control" type="text" id="wallet_enviar"/>
                            <!--<div class="error">La wallet ingresada no es correcta</div>-->
                        </div>

                        <div class="monto_enviar col-xs-12 col-sm-5 col-md-5 col-lg-3">
                            <label>Cantidad en bitcoins</label>
                            <input class="form-control" type="text" id="cantidad_enviar">
                        </div>

                        <div class="select_moneda col-xs-12 col-sm-12 col-md-12">
                            <p>Seleccione la moneda</p>

                            <div class="row">
                                <div id="bitcoin">
                                    <input type="checkbox" id="checkbox1" onclick="check1(this)"/>
                                    <img src="Imagenes/bitcoin.png" height="60" width="60"/>
                                </div>

                                <div id="ethereum">
                                    <input type="checkbox" id="checkbox2" onclick="check2(this)"/>
                                    <img src="Imagenes/ethereum.png" width="60"/>
                                </div>
                            </div>
                        </div>

                        <input type="button" class="action-button1" data-toggle="modal" data-target="#ventana_codigo" value="Enviar"/>
                    </div>
                    <div class="comision">
                        Al monto enviado se le restara la<a href="">comisión</a>
                    </div>


                      @section('titulo_ventana')
                        <h4>Confirmación del envío</h4>
                      @endsection

                      @section('body_ventana')
                        <div class="div_confirmacion">
                            Dirección de tu wallet [Bitcoin]
                                <strong>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</strong>
                                <hr>
                                Enviado a<br><strong>Jose Beieie</strong>
                                <hr>
                                Dirección de la wallet a transferir <strong>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</strong>
                                <hr>
                                Tipo de Moneda <br><strong>Bitcoin</strong>
                                <hr>
                                Cantidad <br><strong>0.00001</strong>
                            </div>
                        @endsection

                  @section('footer_ventana')
                      <input type="submit" class="action-button1" value="Enviar"/>
                  @endsection

                  <!-- CONFRIMACION DE QUE SE HA ENVIADO EL DINERO -->

                  @section('titulo_ventana')
                          <h4>¡Enviado!</h4>
                      @endsection

                      @section('body_ventana')
                          <img align="center" src="Imagenes/confirmar.svg" width="150">
                          <br><br>
                          Se ha enviado la cantidad de <strong>000000.1</strong> btc <br>
                          al usuario <strong>Jose eiieieie</strong><br>
                          Dirección del monedero de Jose ieieiei <br>
                          <strong>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</strong>
                      @endsection

                      @section('footer_ventana')
                          Es posible que la transacción tarde algunos minutos en ser procesada
                      @endsection

                </form>
            </div>
        @endsection
        @endsection








