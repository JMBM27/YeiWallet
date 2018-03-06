@extends("layaouts.plantilla_login_sign")

    @section("title")
       Recuperar su Contraseña
    @endsection




@section("body")

        @section("ventana_formulario")
            <p class="formulario_titulo">Recuperar Contraseña</p>
            <hr>
            <input maxlength="" minlength="" id="recover_psw" name="Recuperar Contraseña" placeholder="Ingrese su correo electrónico"/>
            <div id="gwd-reCAPTCHA_2">
                 <div class="g-recaptcha" data-sitekey="6Ld4A0sUAAAAAPBMP0dW1iyw4WyuBAq0MD6ziWqG"> <!-- style="transform:scale(0.86);-webkit-transform:scale(0.86);transform-origin:0 0;-webkit-transform-origin:0 0;"--></div>
            </div>
            <input type="submit" value="Submit"/>
        @endsection

    @endsection
