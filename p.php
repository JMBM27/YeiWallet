<?php
$fecha = new DateTime();
echo $fecha->format('U = Y-m-d H:i:s') . "\n";

$fecha->setTimestamp(10);
echo $fecha->format('U = Y-m-d H:i:s') . "\n";
?>
