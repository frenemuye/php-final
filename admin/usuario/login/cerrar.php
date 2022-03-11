<?php
/* al parecer sesion star aca no es necesario pendiente revisar*/
	session_start();
	session_destroy();
	//echo "Salió de la sesion";
	header("Location: index.php");
?>