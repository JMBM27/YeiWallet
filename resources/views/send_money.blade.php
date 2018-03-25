@extends("layaouts.plantilla_dashboard")

    @section("title")
        Transferir
    @endsection

    @section("header")
    @endsection

    @section("body")
        @section("content")
              <div id="titulo_trans">Transferir <hr>
                Balance total 0.00001 bitcoins
            </div>

            <div class="div_enviar_money col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form class="">
                    <div class="row">
                        <div class="dir_monedero col-xs-12 col-sm-7 col-md-6 col-lg-6">
                            <label>Dirección de la Wallet</label>
                            <input class="form-control" type="text" id="wallet_enviar"/>
                            <!--<div class="error">La wallet ingresada no es correcta</div>-->
                        </div>

                        <div class="monto_enviar col-xs-12 col-sm-5 col-md-6 col-lg-4">
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
                            <input type="submit" class="button" name="Enviar"/>
                        </div>

                        <div class="comision">
                            Al monto enviado se le restara la<a href="">comisión</a>
                        </div>
                    </div>
                </form>
            </div>
        @endsection
    @endsection





