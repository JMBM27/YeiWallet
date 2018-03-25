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

    $table = <<<EOT
    <p>$precio;</p>
<table>
    <tr>
        <th>$ $alto;</th>
    </tr>
    <tr>
        <th>$ $bajo; ?></th>
    </tr>
    <tr>
        <th>$fecha;</th>
    </tr>
    <tr>
        <th style="color:$color;">$porcentajeCambio;</th>
    </tr>
</table>
EOT;

    echo $table;
?>