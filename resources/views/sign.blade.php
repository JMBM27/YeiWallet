@extends("layaouts.plantilla_login_sign")

    @section("title")
        Registarse
    @endsection

    @section("body")

        <form action="" id="msform">

            <ul id="progressbar">
                <li class="active">Datos de la cuenta</li>
                <li>Datos Personales</li>
                <li>Otros</li>
            </ul>

            <fieldset>
                <p class="formulario_titulo">Registro</p>
                <hr>

                <input type="text" name="usuario" placeholder="Nombre de usuario" id ="nombre" minlength="8" maxlength="15" required>
                <input type="text" name="correo" id ="correo" placeholder="Correo Electronico" maxlength="30" minlength="8" required>
                <input type="password" id="password_1" name="password_1" placeholder="Contraseña" maxlength="10" minlenght="5" required>
                <input  type="password" id="password_2" name="password_2" placeholder="Repetir contraseña" maxlength="10" minlenght="5" required>
                <input type="button" name="next" class="next action-button" value="Siguiente">
            </fieldset>

            <fieldset>
                <p class ="formulario_titulo">Datos Personales<p>
                <hr>
                <input type="text" name="Usuario" placeholder="Nombre" maxlength="20" minlength="6" required>
                <input type="text" name="Usuario" placeholder="Apellido" maxlength="20" minlength="6" required>
                <div class="form group">
                    <select class="form-control" id="pais">
                        <option selected>País</option>
                        <option>Venezuela</option>
                    </select>
                </div>

                <input type="button" name="previous" class="previous action-button" value="Anterior" />
                <input type="button" name="next" class="next action-button" value="Siguiente" />
            </fieldset>
        </form>

    @endsection

