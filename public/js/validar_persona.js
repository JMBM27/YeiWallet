 

function validar_datos (){   

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
    }
}