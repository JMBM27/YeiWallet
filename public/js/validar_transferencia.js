function validar_transferencia (){
        var dir_wallet =document.getElementById("wallet_enviar").value;
        var cant_btc =document.getElementById("cantidad_enviar").value;
        var check1 = document.getElementById("checkbox1").checked;
        var check2 = document.getElementById("checkbox2").checked;
        var error_password = document.getElementById("error_password");
        var error_usuario = document.getElementById("error_usuario");
        var error_email = document.getElementById("error");
        var patron = /[A-Za-z0-9]/;
        var patron_numeros = /(^[0-9]$)(.){1,1}/;

/*
        if(dir_wallet == ""){
            error_usuario.style.display = "block";
            error_usuario.innerHTML = "La dirección del monedero no puede estar vacía";
            return false;
        }
        else if(dir_wallet.length < 27 || dir_wallet.length > 34){
            error_usuario.style.display = "block";
            error_usuario.innerHTML = "La dirección del monedero es muy corta o muy larga";
            return false;
        }
        else if(!patron.test(dir_wallet)){
            error_usuario.style.display = "block";
            error_usuario.innerHTML = "La dirección del monedero no es válida";
            return false;
        }*/
         if(cant_btc == ""){
            error_email.style.display = "block";
            error_email.innerHTML = "La cantidad a enviar no puede estar vacía";
            return false;
        }
        else if(!patron_numeros.test(cant_btc)){
            error_email.style.display = "block";
            error_email.innerHTML = "El monto que quieres enviar no es válido";
            return false;
        }/*
        else if (check1 == false && check2 == false){
            error_password.style.display = "block";
            error_password.innerHTML = "Debe seleccionar una moneda";
            return false;
        }*/else{
            return true;
        }

    }