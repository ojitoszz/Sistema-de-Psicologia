<?php 	
function conectar(){ 
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "Servicio";

	$conec = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	return $conec;
}
 ?>