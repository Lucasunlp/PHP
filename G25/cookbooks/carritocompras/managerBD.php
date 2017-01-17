<?php
	$hostName="localhost";
	$dataBaseName="carritocompras";
	$userName="root";
	$passwordDB="qNQyz3219";
	$conexion= mysql_connect($hostName, $userName, $passwordDB);
	mysql_select_db($dataBaseName);
	if (!($conexion)){
		echo "No puede conectarse a su servidor de Base de Datos.";
	}
?>