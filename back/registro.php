<?php
include("conexion.php");
include("conexionAgenda.php");
session_start();
$conexion = conectar();
$conexionAgenda = conectarAgenda();
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : null;


$consultaMatricula = "SELECT * FROM alumnos WHERE Matricula = '$matricula'";
$resultadoConsulta = mysqli_query($conexion, $consultaMatricula);

$consultaAgenda = "SELECT inicio_normal,final_normal FROM agenda WHERE id_Alumno = '$matricula'";
$resultadoAgenda = mysqli_query($conexionAgenda, $consultaAgenda);


$response = array(); 

if ($resultadoConsulta) {
    $row = mysqli_fetch_assoc($resultadoConsulta);
    $response['alumno'] = $row; 
} else {
    $response['alumno'] = null; 
}

if ($resultadoAgenda) {
    $response['agenda'] = array();
    while ($rowA = mysqli_fetch_assoc($resultadoAgenda)) {
        $agendaItem = array(
            'inicio_normal' => $rowA['inicio_normal'],
            'final_normal' => $rowA['final_normal']
        );
        $response['agenda'][] = $agendaItem;
    }
} else {
    $response['agenda'] = null;
}


$consultaActividades = "SELECT actividad, Observaciones FROM actividades WHERE id_alumno = '$matricula'";
$resultadoActividades = mysqli_query($conexion, $consultaActividades);

if ($resultadoActividades) {
    $response['actividades'] = array();
    $response['padecimientos'] = array(); 
    $response['observaciones'] = array(); 

    while ($row = mysqli_fetch_assoc($resultadoActividades)) {
      
        if ($row['actividad'] === 'actividad') {
            $response['actividades'][] = $row['Observaciones'];
        } elseif ($row['actividad'] === 'padecimientos') {
            $response['padecimientos'][] = $row['Observaciones'];
        } elseif ($row['actividad'] == 'observaciones') {
            $response['observaciones'][] = $row['Observaciones'];
        }
    }
} else {

    $response['actividades'] = array();
    $response['padecimientos'] = array();
    $response['observaciones'] = array();
}

echo json_encode($response);

$listaActividad = isset($_POST['actividad1']) ? $_POST['actividad1'] : null;
$listaActividad2 = isset($_POST['actividad2']) ? $_POST['actividad2'] : null;
$listaActividad3 = isset($_POST['actividad3']) ? $_POST['actividad3'] : null;
$_SESSION['mat'] = $matricula;


if($listaActividad){
    $insertActividad = "INSERT INTO actividades (id,id_alumno,actividad,Observaciones) VALUES (NULL,'$matricula','actividad','$listaActividad)";
    $resultadoActividad = mysqli_query($conexion,$insertActividad);
    
}if($listaActividad2){
    $insertPadecimineto = "INSERT INTO actividades (id,id_alumno,actividad,Observaciones) VALUES (NULL,'$matricula','padecimientos','$listaActividad2)";
    $resultadoObservacion=mysqli_query($conexion,$insertPadecimineto);
    
 }if($listaActividad3){
    $insertObservacion = "INSERT INTO actividades (id,id_alumno,actividad,Observaciones) VALUES (NULL,'$matricula','observaciones','$listaActividad3)";
    $resultadoPadecimiento = mysqli_query($conexion,$insertObservacion);
    

 }





?>
