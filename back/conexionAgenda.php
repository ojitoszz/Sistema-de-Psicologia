<?php 	
function conectarAgenda(){ 
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "eventos";

	$coneccion = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	return $coneccion;
}
 ?>