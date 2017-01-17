<?php
	require("managerBD.php");
	$nombreE=mysql_real_escape_string($_GET['nombreE']);
	$consulta="UPDATE etiqueta SET borrado=0 WHERE nombreE='$nombreE'";
	$ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
	if (mysql_affected_rows()>0){
		echo "Se restauro exitosamente la etiqueta.";
		header("refresh:4;url=adminetiqueta.php");
	}
	else{
		echo "Ocurrio un error al intentar restaurar la etiqueta";
        header("refresh:4;url=adminetiqueta.php");
    }
    include("cerrarConexion.php");
?>