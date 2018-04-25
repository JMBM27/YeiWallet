<?php

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

 @section('header')
    @section('header_dash')
        @section('menu_nav')
            @include("layaouts.plantilla_navbar")
        @endsection
    endsection
@endsection


@section("opc1")           
    select
@endsection


@section("body")
    @section("content")
        <div id="titulo_trans" class="col-col-md-12">
            Dashboard
        </div>

        <div class="dash">
            <div class="row">
                <div class="div_vent_dash col-xs-12 col-sm-5 col-md-5 col-lg-3">
                    <div class="div_moneda_titulo color_btc">
                        Bitcoin
                    </div>
                    <div class="div_moneda_body" id="r_btc">
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
                                <th style="color:" <?php //echo $color?>;><?php //echo $porcentajeCambio; ?></th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="div_vent_dash col-xs-12 col-sm-5 col-md-5 col-lg-3">
                    <div class="div_moneda_titulo color_ltc">
                        Litecoin
                    </div>
                    <div class="div_moneda_body" id="r_ltc">
                        <p>$<?php //echo $precio; ?></p>
                        <table class="table">
                            <tr>
                                <th>1</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div_moneda_titulo color_doge">
                        Dogecoin
                    </div>
                    <div class="div_moneda_body" id="r_doge">
                        <p>$<?php //echo $precio; ?></p>
                        <table class="table">
                            <tr>
                                <th>1</th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="div_vent_dash col-xs-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="div_ult_trans color_ult_trans">
                        Últimas transacciones
                    </div>
                    <div class="div_moneda_body">
                        <table class="table">
                            <?php 
                            $r=rand (1,3);
                            if($r==1) $tipo='Btc';
                            if($r==2) $tipo='Ltc';
                            if($r==3) $tipo='Doge';
                            
                            $tx=App\Http\Controllers\WalletController::ultimasTransaction($r); ?>
                            @if(count($tx)!=0)
                                @for($i	=	0;	$i	< count($tx)  ;	$i++)
                                    <?php if($tx[$i]->tipo==1){
                                        $color = 'style="color: #4ED6A2 !important"';
                                        $sy='+';    
                                        $url='Imagenes/money-in.svg';
                                    }else{
                                        $color = 'style="color: #F97F7F !important"';
                                        $sy='-';
                                        $url='Imagenes/money-out.svg';
                                    }?>
                                    <tr>
                                        <td>{{ $tx[$i]->id }}</td>
                                        <td {{ $color }}>{{ $sy }}{{ number_format($tx[$i]->monto, 8, '.', '') }}</td>
                                        <th><img src="{{ $url }}" class="icono"></th>
                                        <td>{{$tipo}}</td>
                                    </tr>
                                @endfor 
                            @else
                                <tr>
                                    <td>No hay transacciones {{$tipo}}</td>
                                </tr>
                            @endif
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @if (session('notificacion'))
        @section('titulo_ventana')
            <h4><?php echo session('titulo');?></h4>
        @endsection

        @section('body_ventana')
            @if (session('imagen'))
                <img align="center" src="<?php echo asset(session('imagen'));?>" width="120">
            @endif
            <?php echo session('notificacion');?>
        @endsection

        @section('footer_ventana')
            <?php echo session('pie');?>
        @endsection
        @include('layaouts.ventana_notificacion')
    @endif
    
    <script>
        $("document").ready(function(){
            setInterval(function(){
                $("#r_btc").load("{{ asset('precio_bitcoin.php') }}");
            },10000);
        });
    </script>
    <script>
        $("document").ready(function(){
            setInterval(function(){
                $("#r_ltc").load("{{ asset('precio_litecoin.php') }}");
            },10000);
        });
    </script>
    <script>
        $("document").ready(function(){
            setInterval(function(){
                $("#r_doge").load("{{ asset('precio_dogecoin.php') }}");
            },10000);
        });
    </script>
@endsection

       









