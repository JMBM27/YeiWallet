    function validar(){
        if (validar_usuario() && validar_email() && validar_contraseñas()){
            return true;
        }
        else{
            return false;
        }
    }

    function validar_login(){
        if (validar_usuario() && validar_contra()){
            return true;
        }
        else{
            return false;
        }
    }

    function validar_cambio_contraseña(){
        if (validar_email() && validar_contraseñas()){
            return true;
        }
        else{
            return false;
        }
    }
    


    /*--- VALIDA EL USUARIO -----*/

    function validar_usuario(){
        var usuario = document.getElementById("usuario").value;
        var error_usuario = document.getElementById("error_usuario"); 
        var expresion_regular = /^[A-Za-z]\w+$/;

        
         if (usuario == ""){
            document.getElementById("usuario").style.border= "2px solid rgba(255,0,0,0.4)";
            error_usuario.style.display = 'block';
            error_usuario.innerHTML = "El campo del usuario no puede quedar vacío";
            return false;
        }
        else if (usuario.length < 8 || usuario.length > 20){
            document.getElementById("usuario").style.border= "2px solid rgba(255,0,0,0.4)";
            error_usuario.style.display = 'block';
            error_usuario.innerHTML = "El usuario debe tener un minimo de 8 y un maximo de 20 caracteres";
            return false;
        }
        else if (!expresion_regular.test(usuario)){
            document.getElementById("usuario").style.border= "2px solid rgba(255,0,0,0.4)";
            error_usuario.style.display = 'block';
            error_usuario.innerHTML = "El usuario debe empezar al menos con una letra y no admite caracteres especiales";
            return false;
        }
        else{
            return true;
        }
    }

    /*---- VALIDA EL EMAIL -------*/

    function validar_email(){
        var email = document.getElementById("email").value;
        var error_email = document.getElementById("error_email");
        var expresion_correo = /\w+@\w+\.+[a-z]/;
        
        if (email == ""){
            document.getElementById("email").style.border= "2px solid rgba(255,0,0,0.4)";
            error_email.style.display = 'block';
            error_email.innerHTML = "El campo del email no puede quedar vacío";
            return false;
        }
        else if (!expresion_correo.test(email)){
            document.getElementById("email").style.border= "2px solid rgba(255,0,0,0.4)";
            error_email.style.display = 'block';
            error_email.innerHTML = "El correo ingresado no es válido";
            return false;
        }
        else{
            return true;
        }
    }

    /* ---- VALIDA LAS CONTRASEÑAS ------ */

    function validar_contraseñas(){
        var password = document.getElementById("password").value;
        var password_confirm = document.getElementById("password-confirm").value;
        var error_password = document.getElementById("error_password");
        var error_password_2 = document.getElementById("error_password_2");

        if (password == ""){
            document.getElementById("password").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password.style.display = 'block';
            error_password.innerHTML = "El campo de la contraseña no puede quedar vacío";
            return false;
        }
        else if (password.length < 8 || password.length > 20){
            document.getElementById("password").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password.style.display = 'block';
            error_password.innerHTML = "La contraseña debe tener un minimo de 8 y un maximo de 20 caracteres";
            return false;
        }
        else if(password_confirm == ""){
            document.getElementById("password-confirm").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password_2.style.display = 'block';
            error_password_2.innerHTML = "El campo de la contraseña no puede quedar vacío";
            return false;
        }
        else if (password_confirm.length < 8 || password_confirm.length > 20 ){
            document.getElementById("password-confirm").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password_2.style.display = 'block';
            error_password_2.innerHTML = "La contraseña debe tener un minimo de 8 y un maximo de 20 caracteres";
            return false;
        }
        else if (password != password_confirm){
            document.getElementById("password-confirm").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password_2.style.display = 'block';
            error_password_2.innerHTML = "Las contraseñas deben ser iguales";
            return false;     
        }
        else{
            return true;
        }
    }


    /*---------- VALIDA LOS CAMPOS PARA ACTUALIZAR LA PASSWORD ----------*/

    function validar_actualizacion_password(){
        var password = document.getElementById("password").value;
        var password_confirm = document.getElementById("password-confirm").value;
        var password_confirm_2 = document.getElementById("password-confirm-2").value;
        var error_password = document.getElementById("error_password");
        var error_password_2 = document.getElementById("error_password_2");

        if (password == ""){
            document.getElementById("password").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password.style.display = 'block';
            error_password.innerHTML = "El campo de la contraseña no puede quedar vacío";
            return false;
        }
        else if (password.length < 8 || password.length > 20){
            document.getElementById("password").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password.style.display = 'block';
            error_password.innerHTML = "La contraseña debe tener un minimo de 8 y un maximo de 20 caracteres";
            return false;
        }
        else if(password_confirm == "" || password_confirm_2 == ""){
            error_password_2.style.display = 'block';
            error_password_2.innerHTML = "Ninguno de los campos de la nueva contraseña pueden quedar vacío";
            return false;
        }
        else if (password_confirm.length < 8 || password_confirm.length > 20 || password_confirm_2.length < 8 || password_confirm_2.length > 20 ){
            error_password_2.style.display = 'block';
            error_password_2.innerHTML = "Alguna de las nuevas contraseñas tiene menos de 8 caracteres o más de 20";
            return false;
        }
        else if(password_confirm != password_confirm_2){
            error_password_2.style.display = 'block';
            error_password_2.innerHTML = "La contraseña nueva no coinciden";
            return false;
        }
        else{
            return true;
        }
        
    }


    /*----- VALIDA EN EL REGISTRO LOS DATOS PERSONALES ----*/

    function validar_datos_personales(){
        var enviando = false;
        var nombre = document.getElementById("nombre").value;
        var apellido = document.getElementById("apellido").value;
        var checkbox = document.getElementById("terminos_checkbox").checked;
        var f_nacimiento = document.getElementById("fecha_nacimiento").value;
        var error_nombre = document.getElementById("error_nombre");
        var error_apellido = document.getElementById("error_apellido");
        var caracteres = /^[A-Za-z\_\á\é\í\ó\ú\s\xF1\xD1]+$/;

        if (!enviando) {
            if (nombre == "") {
                document.getElementById("nombre").style.border = "2px solid rgba(255,0,0,0.4)";
                error_nombre.style.display = 'block';
                error_nombre.innerHTML = "El campo del nombre no puede estar vacío";
                return false;
            }
            else if (!caracteres.test(nombre)) {
                document.getElementById("nombre").style.border = "2px solid rgba(255,0,0,0.4)";
                error_nombre.style.display = 'block';
                error_nombre.innerHTML = "Solo se permiten letras en el campo del nombre";
                return false;
            }
            else if (nombre.length < 2 || nombre.length > 40) {
                document.getElementById("nombre").style.border = "2px solid rgba(255,0,0,0.4)";
                error_nombre.style.display = 'block';
                error_nombre.innerHTML = "La nombre debe tener un mínimo de 2 letras y un máximo de 40 letras";
                return false;
            }
            else if (apellido == "") {
                document.getElementById("apellido").style.border = "2px solid rgba(255,0,0,0.4)";
                error_apellido.style.display = 'block';
                error_apellido.innerHTML = "El campo del apellido no puede estar vacío";
                return false;
            }
            else if (!caracteres.test(apellido)) {
                document.getElementById("apellido").style.border = "2px solid rgba(255,0,0,0.4)";
                error_apellido.style.display = 'block';
                error_apellido.innerHTML = "Solo se permiten letras en el campo del apellido";
                return false;
            }
            else if (apellido.length < 2 || apellido.length > 60) {
                document.getElementById("apellido").style.border = "2px solid rgba(255,0,0,0.4)";
                error_apellido.style.display = 'block';
                error_apellido.innerHTML = "El apellido debe tener un mínimo de 2 letras y máximo de 60 letras";
                return false;
            }
            else if (f_nacimiento == ""){
                error_f_nacimiento.style.display = 'block';
                error_f_nacimiento.innerHTML = "El campo de la fecha de nacimiento no puede quedar vacío";
                return false;
            }
            else if (!checkbox) {
                error_checkbox.style.display = 'block';
                error_checkbox.innerHTML = "Debe aceptar los términos y condiciones si desea utilizar nuestra plataforma";
                return false;
            }
            else {
                enviando = true;
                return true;
            }
        }
            else{
                 alert("El formulario se esta enviando");
            }
    }

    /*--- ELIMINA LOS ERRORES MOSTRADOS -----*/

    function eliminar_error(variable) {

        if (variable == 1) {
            document.getElementById('error_usuario').style.display = 'none';
            document.getElementById('usuario').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 2) {
            document.getElementById('error_email').style.display = 'none';
            document.getElementById('email').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 3) {
            document.getElementById('error_password').style.display = 'none';
            document.getElementById('password').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 4) {
            document.getElementById('error_password_2').style.display = 'none';
            document.getElementById('password-confirm').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 5) {
            document.getElementById('error_nombre').style.display = 'none';
            document.getElementById('nombre').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 6) {
            document.getElementById('error_apellido').style.display = 'none';
            document.getElementById('apellido').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 7){
            document.getElementById('error_f_nacimiento').style.display = 'none';
        }
        else if (variable == 8){
            document.getElementById('error_wallet').style.display = 'none';
            document.getElementById('wallet_enviar').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if (variable == 9){
             document.getElementById('error_cantidad').style.display = 'none';
             document.getElementById('cantidad_enviar').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if(variable == 10){
            document.getElementById('error_titulo').style.display = 'none';
            document.getElementById('titulo_msj').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if(variable == 11){
            document.getElementById('error_mensaje').style.display = 'none';
            document.getElementById('redaccion').style.border = "1px solid rgba(0,0,0,0.2)";
        }
        else if(variable == 12){
            document.getElementById('error_checkbox').style.display = 'none';
        }
    }


    /*---- VALIDA LA CONSTRASEÑA DEL LOGIN ------ */
    
    function validar_contra(){
        var password = document.getElementById("password").value;
        var error_password = document.getElementById("error_password");
        
        if (password == ""){
            document.getElementById("password").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password.style.display = 'block';
            error_password.innerHTML = "El campo de la contraseña no puede quedar vacío";
            return false;
        }
        else if (password.length < 8 || password.length > 20){
            document.getElementById("password").style.border= "2px solid rgba(255,0,0,0.4)";
            error_password.style.display = 'block';
            error_password.innerHTML = "La contraseña debe tener un minimo de 8 y un maximo de 20 caracteres";
            return false;
        }
        else{
            return true;
        }
    }

    /*---- VALIDAR LA TRANSFERENCIA -----*/
    
    function validar_transferencia(){
        var dir_wallet = document.getElementById("wallet_enviar").value;
        var cant_btc = document.getElementById("cantidad_enviar").value;
        var error_wallet = document.getElementById("error_wallet");
        var error_cantidad = document.getElementById("error_cantidad");
        
        var patron = /^[\w]+$/;
        var patron_numeros = /^[0-9]+([.][0-9]+)?$/;
        
        console.log(parseFloat(balance) - parseFloat(comision));
        
        if(dir_wallet == ""){
            document.getElementById("wallet_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_wallet.style.display = "block";
            error_wallet.innerHTML = "La dirección del monedero no puede estar vacía";
            return false;
        }
        else if(dir_wallet.length < 26 || dir_wallet.length > 35){
              document.getElementById("wallet_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_wallet.style.display = "block";
            error_wallet.innerHTML = "La dirección del monedero es muy corta o muy larga";
            return false;
        }
        else if(!patron.test(dir_wallet)){
            document.getElementById("wallet_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_wallet.style.display = "block";
            error_wallet.innerHTML = "La dirección del monedero no es válida";
            return false;
        }
         if(cant_btc == ""){
             document.getElementById("cantidad_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_cantidad.style.display = "block";
            error_cantidad.innerHTML = "La cantidad a enviar no puede estar vacía";
            return false;
        }
        else if (cant_btc <= 0){
            document.getElementById("cantidad_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_cantidad.style.display = "block";
            error_cantidad.innerHTML = "No se puede enviar la cantidad ingresada";
            return false;  
        }
       else if(!patron_numeros.test(cant_btc)){
            document.getElementById("cantidad_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_cantidad.style.display = "block";
            error_cantidad.innerHTML = "El monto que quieres enviar no es válido";
            return false;
        }
        else if(parseFloat(cant_btc) + parseFloat(comision) > balance){
            document.getElementById("cantidad_enviar").style.border= "2px solid rgba(255,0,0,0.4)";
            error_cantidad.style.display = "block";
            error_cantidad.innerHTML = "No dispone del monto que desea enviar";
            return false;
        }
        else{
            return true;
        }
    }

    /*------ VALIDAR MENSAJE ------*/

    function validar_mensaje(){
        var titulo = document.getElementById("titulo_msj").value;
        var mensaje = document.getElementById("redaccion").value;
        var error_titulo = document.getElementById("error_titulo");
        var error_mensaje = document.getElementById("error_mensaje");
        
        if(titulo == ""){
            document.getElementById("titulo_msj").style.border= "2px solid rgba(255,0,0,0.4)";
            error_titulo.style.display = "block";
            error_titulo.style.marginLeft = "10px"
            error_titulo.innerHTML = "El título del mensaje no puede quedar en blanco";
            return false;
        }
        else if(titulo.length < 10  || titulo.length > 100){
            document.getElementById("titulo_msj").style.border= "2px solid rgba(255,0,0,0.4)";
            error_titulo.style.display = "block";
            error_titulo.style.marginLeft = "10px"
            error_titulo.innerHTML = "El título debe tener entre 10 y 100 caracteres";
            return false;
        }
        else if(mensaje == ""){
            document.getElementById("redaccion").style.border= "2px solid rgba(255,0,0,0.4)";
            error_mensaje.style.display = "block";
            error_mensaje.innerHTML = "El mensaje no puede quedar en blanco";
            return false;
        }
     /*   else if(mensaje.lenght < 10  ||  mensaje.lenght > 1000){
            document.getElementById("redaccion").style.border= "2px solid rgba(255,0,0,0.4)";
            error_mensaje.style.display = "block";
            error_mensaje.style.marginLeft = "10px"
            error_mensaje.innerHTML = "El mensaje debe tener entre 10 y 1000 caracteres";
            return false;
        }*/else{
            return true;
        }
    }




