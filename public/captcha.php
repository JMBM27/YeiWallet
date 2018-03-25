<?php

    $valor_recaptcha = $_POST['g-recaptcha-response'];
        if(isset($valor_recaptcha) && $valor_recaptcha){  /*iset define si una variable  es nula*/
            $clave_secreta = "6Ld4A0sUAAAAAII0WNu5cEP0htWqmC_nGT4EtLn_";
            $ip = $_SERVER['REMOTE_ADDR'];
            $validar_servidor = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$clave_secreta&response=$valor_recaptcha&remoteip=$ip");
            var_dump($validar_servidor);
        }

?>
