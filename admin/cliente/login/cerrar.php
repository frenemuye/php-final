<?php
/* al parecer sesion star aca no es necesario pendiente revisar*/
	session_start();
	
	session_destroy();

	// Eliminar una variable, 
	unset($_SESSION);
	//echo "Salió de la sesion";
	header("Location: index.php");
?>