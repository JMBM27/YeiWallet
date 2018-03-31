<?php
$url = "http://www.bitstamp.net/api/ticker/";
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

$table = 
    '<p>$' . $precio . '</p>
    <table class="table">
        <tr>
            <th>Precio más alto $' . $alto . '</th>
        </tr>
        <tr>
            <th>Precio más bajo $' . $bajo . '</th>
        </tr>
        <tr>
            <th>' . $fecha . '</th>
        </tr>
        <tr>
            <th style="color: ' . $color . '">' . $porcentajeCambio . ' </th>
        </tr>
    </table>';

echo $table;
?>
