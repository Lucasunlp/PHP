<?php
	require("managerBD.php");
	$idA=mysql_real_escape_string($_GET['autor_id']);
	$consulta="UPDATE autor SET borrado=0 WHERE autor_id='$idA'";
	$ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
	if (mysql_affected_rows()>0){
		echo "Se restauro exitosamente el autor.";
		header("refresh:4;url=adminautor.php");
	}
	else{
		echo "Ocurrio un error al intentar restaurar el autor";
        header("refresh:4;url=adminautor.php");
    }
    include("cerrarConexion.php");
?>