<?php
	if ($_POST["autor"] && $_POST["nacionalidad"]) {
		require("managerBD.php");
		$autor=mysql_real_escape_string($_POST["autor"]);
        $nacionalidad=mysql_real_escape_string($_POST["nacionalidad"]);
        $idA=mysql_real_escape_string($_POST['idA']);
        $consulta="UPDATE autor SET nombreA='$autor' , nacionalidad='$nacionalidad' WHERE autor_id='$idA'";
        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());

        if (mysql_affected_rows()>0) {
        	echo "Se actualiz&oacute; correctamente el autor con ID " . $idA .'<BR/>';
        	header("refresh:3;url=adminautor.php");
        }
        else{
        	echo "Hubo un error al actualizar los datos.";
        	header("refresh:3;url=adminautor.php");

        }
    }
    include("cerrarConexion.php");
?>