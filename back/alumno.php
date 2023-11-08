<?php
include("conexion.php");
$conexion = conectar();
$nombre = $_POST['usuario'];
$apellido1 = $_POST['pApellido'];
$apellido2 = $_POST['sApellido'];
$genero = $_POST['genero'];
$matricula = $_POST['matricula'];
$grupo = $_POST['grupo'];
$carrera = $_POST['carrera'];
$psicologo = $_POST['psicologo'];
$numero = $_POST['celular'];
$token = 'EAAJSfciYSMoBO3aacyeDMpS4dhNOlkPidD015QaBOeEYFwUPbGR4HXSCyfS8vkypJJr9Qu0sYpPhzlZAYB66jTDqTV832EvTSxyQFhVg7RXYRtnWmOzzpw86drgI79PrWA5a0zBZCjUtuX1ZBmaKxbFvzc1Us9pmdtPEZAls4143ZCGerGEzZCY13t3hqfHF1YwUZA3RWDuykwbJdbZADtT4LuvVj8nZBtzyqrKIZD';


// Verificar si la matrícula ya está registrada
$consultaMatricula = "SELECT Matricula FROM alumnos WHERE Matricula = '$matricula'";
$resultadoConsulta = mysqli_query($conexion, $consultaMatricula);

if (mysqli_num_rows($resultadoConsulta) > 0) {
    // La matrícula ya está registrada
    mysqli_close($conexion);
    echo "<script>alert('Matrícula registrada. Por favor, dirígete al cubículo de psicología.'); window.location.href = '../Pages/Estudiantes/index.html';</script>";
    exit();
}

// Insertar datos en la base de datos
$peticion = "INSERT INTO alumnos (id_Alumno, Nombres, PrimerApellido, SegundoApellido, Genero, Matricula, Grupo, Carrera, Psicologo, ContadorCita, NumeroTelefonico) VALUES (NULL, '$nombre', '$apellido1', '$apellido2', '$genero', '$matricula', '$grupo','$carrera','$psicologo',0,'$numero')";
$resultado = mysqli_query($conexion, $peticion);

if ($resultado) {

    $url = 'https://graph.facebook.com/v17.0/140886465766244/messages';
    $mensaje = json_encode([
        'messaging_product' => 'whatsapp',
        'to' => $numero,
        'type' => 'template',
        'template' => [
            'name' => 'ojitos',
            'language' => [
                'code' => 'es_MX'
            ],
           
        ]
    ]);
    
    
    $header = [
        "Authorization: Bearer " . $token,
        "Content-Type: application/json"
    ];
    
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = json_decode(curl_exec($curl), true);
    
    print_r($response);
    
    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    curl_close($curl);
    
    mysqli_close($conexion);
    
   // echo "<script>alert('Registro exitoso'); window.location.href = '../Pages/Estudiantes/index.html';</script>";
} else {
    // Error en la inserción
    mysqli_close($conexion);
    echo "<script>alert('Error al registrar. Inténtalo nuevamente.'); window.location.href = '../Pages/Estudiantes/index.html';</script>";
}
?>
