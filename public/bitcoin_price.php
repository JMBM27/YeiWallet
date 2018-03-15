<?php
$url = "https://www.bitstamp.net/api/ticker/";
$fgc = file_get_contents($url);
$json = json_decode($fgc, true);
$precio = $json["last"];
$open = $json["open"];

if ($open < $precio){

    $indicator = "+";
    $cambio = $precio - $open;
    $porcentaje = $cambio / $open;
}

$table = <<<EOT
<td>$precio;
EOT;
echo $table;
?>

