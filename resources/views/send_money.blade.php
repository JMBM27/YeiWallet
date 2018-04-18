@extends("layaouts.contenido_dashboard")

@section("title")
    Transferir
@endsection

 @section('header')
    @section('header_dash')
        @section('menu_nav')
            @include("layaouts.plantilla_navbar")
        @endsection
    endsection
@endsection


@section("opc2")
    select
@endsection

@section("body")
    @section("content")
        <div id="titulo_trans">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                    Transferir
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 style="margin: 17px;"><?php echo $address; ?></h5>
                </div>
            </div> 
        </div>
        <hr>
        <h5 style="margin-left: 17px;"><?php echo "  Saldo disponible: " . $balance; ?></h5>

        <div class="row" id="trans">
            <div class="div_enviar_money col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form method="POST" action="{{ route('send.wallet') }}" autocomplete ="off">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="dir_monedero col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Dirección de la Wallet</label>
                            <input name="address" class="form-control" type="text" id="wallet_enviar" onclick="eliminar_error(8);"/>
                            <div id="error_wallet"></div>
                        </div>

                        <div class="monto_enviar col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Cantidad en <?php echo $moneda; ?></label>
                            <input name="monto" class="form-control" type="text" id="cantidad_enviar" onclick="eliminar_error(9);">
                            <div id="error_cantidad"></div>
                        </div>

                        <input type="button" class="action-button1" data-toggle="modal" data-target="#ventana_codigo" value="Enviar"/>
                        <input type="hidden" name="wallet" value="<?php echo $wallet; ?>"/> 
                        <input type="submit" class="action-button1" value="Enviar"/>
                    </div>
                    <div class="comision col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        Al monto enviado se le restara la<a href="">comisión</a>
                    </div>


                      @section('titulo_ventana')
                        <h4>Confirmación del envío</h4>
                      @endsection

                      @section('body_ventana')
                        <div class="div_confirmacion">
                                Destinatario<br><strong>Usuario</strong><hr>
                                Tipo de Moneda <br><strong>Bitcoin</strong><hr>
                                Cantidad <br><strong>0.00001</strong><hr>
                                Codigo
                                <input type="text" class="form-control" placeholder="Introducir el codigo">
                                
                            </div>
                        @endsection

                  @section('footer_ventana')
                      <input type="submit" class="action-button1" value="Enviar"/>
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