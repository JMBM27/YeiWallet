

function submit_ajax() {
    var nombre = document.getElementById("nombre").value;

    var url = "procesar_ajax.php";


        $.ajax({
            type: "post",
            url: url,
            data: {nombre:nombre},
            success: function (datos) {
                $('#mostrar_datos').html(datos);
            }
        })
}
