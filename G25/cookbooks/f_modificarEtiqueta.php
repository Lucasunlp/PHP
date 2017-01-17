<?php
    require("managerBD.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificación de Etiqueta</title>
    </head>

    <body>
        <p>Atencion: Solo se podran modificar etiquetas que no tengan libros asociados.</p>
            <form action="modEtiqueta.php" method="post" name="formulario" style="text-align:left;font-family:Arial;font-size: 12px">
            <LABEL for="etiquetaVieja">Nombre de la etiqueta a modificar:</LABEL><BR/>
            <INPUT type="text" id="etiquetaVieja" name="etiquetaVieja" required><BR/>

            <LABEL for="etiquetaNueva">Nuevo nombre:</LABEL><BR/>
            <INPUT type="text" id="etiquetaNueva" name="etiquetaNueva" required><BR/>

            <INPUT type="submit" value="Guardar"/>
            <INPUT type="reset" value="Cancelar"/>
        </form>
    </body>
</html>