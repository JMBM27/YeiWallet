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
        <h5 style="margin-left: 17px;"><?php echo "  Saldo disponible: " . $balance . "  Comision estimada: " . $comision;?></h5>

        <div class="row" id="trans">
            <div class="div_enviar_money col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('send.wallet') }}" autocomplete ="off" onsubmit="return validar_transferencia();">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="dir_monedero col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Dirección de la Wallet</label>
                            <input name="address" class="form-control" type="text" id="wallet_enviar" onclick="eliminar_error(8);" value="{{ old('address') }}"/>
                            @if ($errors->has('address'))
                                <div style="display: block;" id="error_wallet">
                                    {{ $errors->first('address') }}
                                </div>
                            @else
                                <div id="error_wallet">
                                </div>
                            @endif
                        </div>

                        <div class="monto_enviar col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Cantidad en <?php echo $moneda; ?></label>
                            <input name="cantidad" class="form-control" type="text" id="cantidad_enviar" onclick="eliminar_error(9);">
                            @if ($errors->has('cantidad'))
                                <div style="display: block;" id="error_cantidad">
                                    {{ $errors->first('cantidad') }}
                                </div>
                            @else
                                <div id="error_cantidad">
                                </div>
                            @endif
                        </div>
                        
                        <input type="hidden" name="tipo" value="<?php echo $tipo; ?>"/> 
                        
                        <input type="button" class="action-button1" value="Enviar" onClick="validar_boton()"/>
                        <script>
                            var balance = "<?php echo $balance?>";
                            var comision = "<?php echo $comision?>";
                            console.log(comision);
                            function validar_boton(){
                                if(validar_transferencia()==true){
                                    $("#ventana_codigo").modal('show');
                                    document.getElementById("dato1").innerHTML=document.getElementById("wallet_enviar").value;
                                    document.getElementById("dato2").innerHTML=document.getElementById("cantidad_enviar").value;
                                }
                            }
                        </script>
                    </div>
                    <div class="comision col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        Al monto enviado se le restara la<a href="">comisión</a>
                    </div>
                    
                    @section('titulo_ventana')
                        <h4>Confirmación del envío</h4>
                    @endsection

                    @section('body_ventana')
                        <div class="div_confirmacion">
                            Destinatario<br><strong id="dato1"></strong><hr>
                            Tipo de Moneda <br><strong><?php echo $moneda; ?></strong><hr>
                            Cantidad <br><strong id="dato2"></strong>
                            <?php if(Auth::user()->pin_status==true){ ?>
                                <hr>
                                Codigo
                                <input name="pin" type="password" class="form-control" placeholder="Introducir el codigo">
                            <?php }?>
                        </div>
                    @endsection

                    @section('footer_ventana')
                      <input type="submit" class="action-button1" value="Enviar"/>
                    @endsection
                    
                    @include('layaouts.plantilla_ventana')
                    
            </form>
        </div>
    @endsection
@endsection