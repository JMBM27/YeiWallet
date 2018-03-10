@extends("layaouts.plantilla_login_sign")

    @section("title")
        Iniciar Sesión
    @endsection

    @section("body")


            <form action="" id="msform">

                <fieldset>
                  <p class="formulario_titulo">Ingresar</p>
                 <hr> <!-- SEPARAR LAS SECCIONES DE LECTURA -->

                    <label for="Usuario"><b>Usuario</b></label>
                <input maxlength="20" minlength="8" id="user_name" name="Usuario" placeholder="Introducir tu Usuario" type="text">

                <label for="Contraseña"><b>Contraseña</b></label>
                <input maxlength="20" minlength="8" id="password" name="Contraseña" placeholder="Introducir tu Contraseña" type="password">
                  <input type="submit" class="action-button" value="Ingresar"/>
                <a href="#"><h6>¿Olvidó su contraseña?</h6></a>
                </fieldset>
            </form>

    @endsection
