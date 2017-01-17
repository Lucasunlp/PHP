<?php
// Ejemplo de acceso a base de datos en PHP
$database="cookbooks";
$user="root";
$password="33506182";
 
// Conectarse a la base de datos
mysql_connect("localhost",$user,$password);
@mysql_select_db($database) or die( "Error de conexion");
 
// Insertar un registro en la base de datos
//$sentencia="insert into tabla (nombre, edad, fecha_alta) "
       //   . "values ('Pedro Ramírez', 36, '2012-04-14' )";
//mysql_query($sentencia);
 
// Realizar una consulta a la base de datos
$sentencia="select nombre from autor  ";
$result=mysql_query($sentencia);
$num=mysql_numrows($result);
$i=0;
while ($i < $num) {
    $nombre=mysql_result($result,$i,"nombre");
  //  $edad=mysql_result($result,$i,"edad");
   // $fecha=mysql_result($result,$i,"fecha_alta");
    echo "Nombre: " . $nombre . "n";
   // echo "edad: " . $edad . "n";
   // echo "fecha: " . $fecha . "n";
    $i++;
}
 
// Cerrar la base de datos
mysql_close();
?>