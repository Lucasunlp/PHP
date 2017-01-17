<?php
	require("managerBD.php");
	$nombreE=mysql_real_escape_string($_GET['nombreE']);
	$consulta= "SELECT * FROM etiqueta WHERE nombreE='$nombreE'";
	$ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
	$etiqueta=mysql_fetch_array($ejecutarConsulta);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Etiqueta</title>
    </head>
	<script lang="javascript">
  
 function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
 
 </script> 

    <body>
        <form action="modEtiqueta.php" method="post" name="formulario" style="text-align:left;font-family:Arial;font-size: 12px">
            <LABEL for="etiqueta">Nombre de la Etiqueta:</LABEL><BR/>
            <INPUT type="text" id="etiqueta" onkeypress="return soloLetras(event)" name="etiqueta" value="<?php echo $etiqueta['nombreE'];?>" required><BR/>

            <INPUT type="hidden" id="etiqueta_vieja" name="etiqueta_vieja" value="<?php echo $etiqueta['nombreE'];?>"> </INPUT>

            <INPUT type="submit" value="Guardar"onClick= "soloLetras()"/>
            <INPUT type="reset" value="Cancelar"/> <BR/>
            <a style="text-decoration:none" href="adminetiqueta.php">  <INPUT type="button" value="Atras" style="font-family:Arial; height: 25px; font-size:14px; line-height: 10px;"> </INPUT> </a>

        </form>
    </body>
</html>
