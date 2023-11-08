<?php
include("conexion.php");
$conexion = conectar();
session_start();
$matricula = $_SESSION['matricula'];


$nuevaActividad = $_POST['actividad'];
$nuevoPadecimiento = $_POST['padecimiento'];
$nuevaObservacion = $_POST['observacion'];

// Realiza las consultas SQL para agregar los nuevos datos
// Aquí debes ejecutar tus consultas SQL para insertar los nuevos datos

// Luego, obtén los datos actualizados
// Debes ejecutar consultas SQL similares a las anteriores para obtener los datos actualizados

// Crea un arreglo asociativo con los datos actualizados
$data = array(
    'actividades' => $actividades_actualizadas,
    'padecimientos' => $padecimientos_actualizados,
    'observaciones' => $observaciones_actualizadas
);

// Retorna los datos actualizados en formato JSON
echo json_encode($data);
?>
