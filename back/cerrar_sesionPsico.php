<?php
session_unset();
session_destroy();
header("Location: ../index.html"); // Cambia "index.php" al archivo de inicio de tu elección
exit();

?>