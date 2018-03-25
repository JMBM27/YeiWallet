function validar(){
        
    var usuario = document.getElementById("usuario").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_confirm = document.getElementById("password-confirm").value;
    var error_usuario = document.getElementById("error_usuario");
    var error_email = document.getElementById("error_email");
    var error_password = document.getElementById("error_password");

    var expresion_regular = /(?=(?:.*\d){2})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){5})\S{8,20}$/;
    var expresion_correo = /\w+@\w+\.+[a-z]/;
  
    
 
    if (usuario == ""){
        error_usuario.style.display = 'block';
        error_usuario.innerHTML = "El campo del usuario no puede estar vacío";
        return false;
    }
    else if (usuario.length < 8 || usuario.length > 20){
        error_usuario.style.display = 'block';
        error_usuario.innerHTML = "El usuario debe tener un minimo de 8 y un maximo de 20 caracteres";
        return false;
    }
    else if (!expresion_regular.test(usuario)){
        error_usuario.style.display = 'block';
        error_usuario.innerHTML = "EL usuario debe tener al menos 1 mayúscula y 2 dígitos";
        return false;
    }                                                                        
    else if (email == ""){
        error_email.style.display = 'block';
        error_email.innerHTML = "El campo del email no puede estar vacío";
        return false;
    }
    else if (!expresion_correo.test(email)){
        error_email.style.display = 'block';
        error_email.innerHTML = "El correo ingresado no es válido";
        return false;
    }
    else if (password == "" || password_confirm == ""){
        error_password.style.display = 'block';
        error_password.innerHTML = "Los campos de las contraseñas no pueden estar vacíos";
        return false;
    }
    else if (password.length < 8 || password.length > 20 || password_confirm.length < 8 || password_confirm.length > 20 ){
        error_password.style.display = 'block';
        error_password.innerHTML = "Las contraseñas deben tener un minimo de 8 y un maximo de 20 caracteres";
        return false;
    }
    else if (!expresion_regular.test(password) || !expresion_regular.test(password_confirm)){
        error_password.style.display = 'block';
        error_password.innerHTML = "EL usuario debe tener al menos 1 mayúscula y 2 dígitos";
        return false;      
    }
    else if (password != password_confirm){
        error_password.style.display = 'block';
        error_password.innerHTML = "Las contraseñas deben ser iguales";
        return false;     
    }
     else{
        return true;
    }

        
    /* VALIDA EL SEGUNDO FIELDSET, PERO COMO YA DEVOLVIO TRUE LA FUNCION, NO CUENTA ESTA
    PARTE.
    */
  /*  
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    
    var expresion_nombre = /[a-zA-Z]/;
    
     
      if (nombre == ""){
        alert ("El campo del nombre no puede estar vacío");
        return false;
    }
    else if (!expresion_nombre.test(nombre)){
        alert ("En el campo del nombre solo se aceptan letras");
        return false;
    }
    else if (apellido == ""){
        alert ("El campo del apiilo no puede estar vacío");
        return false;
    }
    else if (!expresion_nombre.test(apellido)){
        alert ("En el campo del apellido solo se aceptan letras");
        return false;
    }
    else{
        return true;
    }*/
}


function eliminar_error() {
    document.getElementById('error_usuario').style.display = 'none';
    document.getElementById('error_email').style.display = 'none';
    document.getElementById('error_password').style.display = 'none';

}
    




