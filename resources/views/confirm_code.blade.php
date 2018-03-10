@extends("layaouts.plantilla_login_sign")

    @section("title")
       Recuperar su Contraseña
    @endsection




    @section("body")

        @section("ventana_formulario")
            <form>
                <fieldset>
                    <p class="formulario_titulo" id="contenido">Recuperar Contraseña</p>
                    <hr>
                    <input maxlength="6" minlength="6" id="recover_code" name="Codigo" placeholder="Ingrese el código"/>
                </fieldset>
            </form>
        @endsection

    @endsection
