<?php
include("conexion.php");
include("conexionAgenda.php");
$conexion = conectar();
$conexionAgenda = conectarAgenda();
session_start();

// Obtén la matrícula del formulario
$matricula = $_POST['matricula'];

// Consulta de actividades, observaciones y padecimientos
$consultaActividades = "SELECT actividad, Observaciones FROM actividades WHERE id_alumno = '$matricula'";

$resultadoActividades = mysqli_query($conexion, $consultaActividades);

$response = array(); // Creamos un arreglo para almacenar la respuesta JSON

if ($resultadoActividades) {
    $response['actividades'] = array(); // Arreglo para almacenar las actividades
    $response['padecimientos'] = array(); // Arreglo para almacenar los padecimientos
    $response['observaciones'] = array(); // Arreglo para almacenar las observaciones

    while ($row = mysqli_fetch_assoc($resultadoActividades)) {
        // Dependiendo del valor de 'actividad', almacenar en el arreglo correspondiente
        if ($row['actividad'] === 'actividad') {
            $response['actividades'][] = $row['Observaciones'];
        } elseif ($row['actividad'] === 'padecimientos') {
            $response['padecimientos'][] = $row['Observaciones'];
        } elseif ($row['actividad'] === 'observaciones') {
            $response['observaciones'][] = $row['Observaciones'];
        }
    }
} else {
    // Si no se encontraron resultados
    $response['actividades'] = array();
    $response['padecimientos'] = array();
    $response['observaciones'] = array();
}

echo json_encode($response);
?>
