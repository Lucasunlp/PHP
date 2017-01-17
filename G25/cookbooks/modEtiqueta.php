<?php
	if ($_POST["etiqueta"]) {
		require("managerBD.php");
		$etiqueta_nueva=mysql_real_escape_string($_POST["etiqueta"]);
        $etiqueta_vieja=mysql_real_escape_string($_POST['etiqueta_vieja']);
        $consulta="UPDATE etiqueta SET nombreE='$etiqueta_nueva' WHERE nombreE='$etiqueta_vieja'";
        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
        if (mysql_affected_rows()>0) {
        	echo "Se actualiz&oacute; correctamente la etiqueta: " . $etiqueta_vieja .'<BR/>';
            echo "El nuevo valor es: " . $etiqueta_nueva . '<BR/>';
        	header("refresh:3;url=adminetiqueta.php");
        }
        else{
        	echo "Hubo un error al actualizar los datos.";
        	header("refresh:3;url=adminetiqueta.php");

        }
    }
    include("cerrarConexion.php");
?>