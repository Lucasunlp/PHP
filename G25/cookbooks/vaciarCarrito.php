<?php
	require("managerBD.php");
	session_start();
	unset($_SESSION['carrito']);
	header("Location: carritodecompras.php");
	exit;
?>