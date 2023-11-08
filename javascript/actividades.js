<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    $(document).ready(function() {
        $("#mostrarDatos").click(function() {
            // Realizar una solicitud AJAX para obtener los datos
            $.ajax({
                url: "obtener_datos.php", // Cambia esto al archivo PHP que obtiene los datos
                type: "POST",
                dataType: "json",
                success: function(data) {
                    // Mostrar los datos en los campos
                    $("#actividades").text(data.actividades);
                    $("#padecimientos").text(data.padecimientos);
                    $("#observaciones").text(data.observaciones);
                },
                error: function() {
                    alert("Error al cargar los datos.");
                }
            });
        });

        $("#agregarDatos").click(function() {
            // Obtener los nuevos datos de los cuadros de texto
            var nuevaActividad = $("#nuevaActividad").val();
            var nuevoPadecimiento = $("#nuevoPadecimiento").val();
            var nuevaObservacion = $("#nuevaObservacion").val();

            // Realizar una solicitud AJAX para agregar los nuevos datos
            $.ajax({
                url: "agregar_datos.php", // Cambia esto al archivo PHP que agrega los datos
                type: "POST",
                data: {
                    actividad: nuevaActividad,
                    padecimiento: nuevoPadecimiento,
                    observacion: nuevaObservacion
                },
                success: function(response) {
                    // Actualizar los campos después de agregar los datos
                    $("#actividades").text(response.actividades);
                    $("#padecimientos").text(response.padecimientos);
                    $("#observaciones").text(response.observaciones);
                },
                error: function() {
                    alert("Error al agregar los datos.");
                }
            });
        });
    });
