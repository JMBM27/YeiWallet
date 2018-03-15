

    var formulario = document.getElementById("hola");


    window.onload = iniciar;

/* SELECCIONAR ELEMENTOS DE UN FORMULARIO */

 function iniciar () {
     document.getElementById("enviar_1").addEventListener('click', validar, false);
 }

    function validaNombre() {
        var elemento = document.getElementById("user_name");
        limpiarError(elemento);
        if (elemento.value == "") {
            alert("El campo no puede ser vacío");
            return false;
        }
        return true;
    }

 function validarContra() {
     var elemento = document.getElementById("password");
     if (elemento.value == ""){
         alert("El campo no puede estar vacio.");
         return false;
     }
     return true;
 }

    function validar(e) {
        if (validaNombre() && validarContra() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    }























/*function validar(){

    var username = document.getElementById("user_name").value;
    var pass = document.getElementById("password").value;
    var email = document.getElementById("email").value;

    expresion = /\w+@\w+\.+[a-z]/;


    if(username == "" || pass == "" || email == ""){
        alert("Todos los campos son necesarios.");
        return false;
    }
     else if(username.length < 8 || username.length > 20 ){
        alert("El usuario solo permite entre 8 y 20 caracteres.");
        return false;
    }
    else if(pass.length < 8 || pass.length > 20){
        alert("La contraseña solo permite entre 8 y 20 caracteres.");
        return false;
    }
    else if(!expresion.test(email)){
        alert("El correo no es válido.");
        return false;
    }
    return true;
    */
}


