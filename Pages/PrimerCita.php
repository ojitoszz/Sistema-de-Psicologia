<?php
include("../back/conexion.php");
$conexion = conectar();

$consultaCitas = "SELECT * FROM alumnos WHERE ContadorCita = 0";
$resultadoCitas = mysqli_query($conexion, $consultaCitas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer Cita</title>
    <!-- Agrega el enlace al CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css">
</head>
<body>


<div class="col-lg-12 ">
        <header>
        <div class="cabezera">
            <img src="https://tesoem.edomex.gob.mx/themes/seitheme3/logo.svg" alt="Logo">
        </div>
        </header>
        
    <div class="container mt-5">
        <h1>Alumnos  pendientes de Cita</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Matricula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = mysqli_fetch_assoc($resultadoCitas)) {
                    echo "<tr>";
                    echo "<td>{$fila['Nombres']}</td>";
                    echo "<td>{$fila['PrimerApellido']}</td>";
                    echo "<td>{$fila['SegundoApellido']}</td>";
                    echo "<td>{$fila['Matricula']}</td>";
                    echo "<td><a href='Administrador/calendario/index.php?matricula={$fila['Matricula']}' class='btn btn-primary'>Asignar Cita</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Agrega el enlace al JavaScript de Bootstrap 5 (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
