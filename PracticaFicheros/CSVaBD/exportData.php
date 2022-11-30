<?php
//iConexion a la BD
include 'funciones.php';
	escribirCSVBD("miembro.csv");
	header("Location:index.php");


?>