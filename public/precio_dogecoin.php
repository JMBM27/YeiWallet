<?php
$url = "https://api.coinmarketcap.com/v1/ticker/dogecoin/";
$opt=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);
$fgc = file_get_contents($url,false, stream_context_create($opt));
$json = json_decode($fgc, true);
$precio = number_format($json[0]["price_usd"],6);
$porcentajeCambio = number_format($json[0]["percent_change_1h"],2);
$fecha = date("d-m-Y - h:i:sa" );

if ($porcentajeCambio>0){
    $color = "green";
}
else{
    $color = "red";
}

$table = 
    '<p>$' . $precio . '</p>
    <table class="table">
        <tr>
            <th>' . $fecha . '</th>
        </tr>
        <tr>
            <th style="color: ' . $color . '">' . $porcentajeCambio . ' </th>
        </tr>
    </table>';

echo $table;
?>
