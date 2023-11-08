<?php

include("conexion.php");
$conexion = conectar();
session_start();
$matricula = 196020128;
$option1 = isset($_POST['actividad1']) ? $_POST['actividad1'] : '';
$option2 = isset($_POST['actividad2']) ? $_POST['actividad2'] : '';
$option3 = isset($_POST['actividad3']) ? $_POST['actividad3'] : '';



if($option1){
    $insertActividades = "INSERT INTO actividades (id_alumno, actividad, Observaciones) VALUES (?, 'actividad', ?)";
    $stmt = mysqli_prepare($conexion, $insertActividades);
    mysqli_stmt_bind_param($stmt, "ss", $matricula, $option1);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}if($option2){

    $insertObservaciones = "INSERT INTO actividades (id_alumno, actividad, Observaciones) VALUES (?, 'observaciones', ?)";
    $stmt = mysqli_prepare($conexion, $insertObservaciones);
    mysqli_stmt_bind_param($stmt, "ss", $matricula, $option2);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}if($option3){ 

$insertPadecimientos = "INSERT INTO actividades (id_alumno, actividad, Observaciones) VALUES (?, 'padecimientos', ?)";
$stmt = mysqli_prepare($conexion, $insertPadecimientos);
mysqli_stmt_bind_param($stmt, "ss", $matricula, $option3);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
}

?>
