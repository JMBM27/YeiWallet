@extends("layaouts.plantilla_dashboard")

    @section("title")
        Transferir
    @endsection

    @section("header")
    @endsection

    @section("body")
        @section("content")
            <div class="div_enviar_money">
                <h1>Usted dispone de <?php echo $prices ?>bitcoins</h1> <!-- price esta en el archivo prueba.php, quiero que me muestre el valor aqui -->
                <hr>
                <form>
                    <label>Enviar a la dirección</label>
                    <input type="text" id="cantidad_enviar"/>
                    <label>Eliga su monedero</label>

                </form>
                <input type="submit" class="button" name="Enviar"/>
            </div>
        @endsection
    @endsection





