<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault();
            const matricula = $('#validationDefault01').val();

            $.ajax({
                type: 'POST',
                url: '../back/registro.php',
                data: { matricula: matricula },
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#nombres').text(data.Nombres);
                        $('#primerApellido').text(data.PrimerApellido);
                        $('#segundoApellido').text(data.SegundoApellido);
                        $('#genero').text(data.Genero);
                        $('#matricula').text(data.Matricula);
                        $('#grupo').text(data.Grupo);
                        $('#resultado').removeClass('d-none');
                    } else {
                        $('#resultado').addClass('d-none');
                        alert('No se encontraron datos para la matrícula proporcionada.');
                    }
                },
                error: function() {
                    $('#resultado').addClass('d-none');
                    alert('Ha ocurrido un error en la búsqueda.');
                }
            });
        });
    });
</script>