<?php
    require("managerBD.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alta de Etiqueta</title>
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
        <form action="guardarEtiqueta.php" method="post" name="formulario" style="text-align:left;font-family:Arial;font-size: 12px">
            <LABEL for="etiqueta">Nombre de la Etiqueta:</LABEL><BR/>
            <INPUT type="text" id="etiqueta" onkeypress="return soloLetras(event)" name="etiqueta" required><BR/>

            <INPUT type="submit" value="Guardar"onClick= "soloLetras()"/>
            <INPUT type="reset" value="Cancelar"/> <BR/>
            <a style="text-decoration:none" href="adminetiqueta.php">  <INPUT type="button" value="Atras" style="font-family:Arial; height: 25px; font-size:14px; line-height: 10px;"> </INPUT> </a>

        </form>
    </body>
</html>
