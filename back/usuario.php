
<?php
include("../back/conexion.php");
session_start();
$conexion=conectar();


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$_SESSION['usuario'] = $usuario;

	$peticion = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."'";
	$resultado = mysqli_query($conexion, $peticion);
 	 

if(mysqli_num_rows($resultado) > 0 ){
	echo "<script>window.location='../Pages/home.html'</script>";
	echo  $_SESSION['id_usuario']=2;


 }else{	
echo "<script type=\"text/javascript\">alert(\"Contraseña incorrecta\");</script>";
echo "<script>window.location='../index.php'</script>";
  }

?>