<?php
    require("managerBD.php");
    
    if(empty($_SESSION)) // if the session not yet started
        session_start();

    if(isset($_SESSION['nombreU'])) { // if already login
        header("location: home.php"); // send to home page
        exit; 
    }
    if ($_POST["dni"] && $_POST["clave"]){
        $dni=mysql_real_escape_string($_POST["dni"]);
        $clave=mysql_real_escape_string($_POST["clave"]);
        $consulta= "SELECT * FROM usuario WHERE nombreU='$dni' AND clave='$clave'";
        $ejecutarConsulta=mysql_query($consulta) or die (mysql_error());
        echo mysql_error();
        if (mysql_num_rows($ejecutarConsulta) == 1) {
            $user=mysql_fetch_array($ejecutarConsulta);
            $_SESSION['nombre']= $user['nombre'];
            $_SESSION['nombreU']= $user['nombreU'];
            $_SESSION['esAdmin']= $user['esAdmin'];
            echo "Todo bien";                //USAR hasher para CLAVE
            header("location:home.php");
        }
        else{
            echo $ejecutarConsulta;
            echo "Todo Mal";
        }
        include("cerrarConexion.php");

    }
    else{
        header("location: home.php");
    }
?>