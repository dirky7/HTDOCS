<?php

	include "funciones.php";
	$base = "alumnos";
	$id = $_GET['id'];
	$query = "delete FROM dwes_alumnos WHERE id='$id'";
	operarConsulta($base, $query);
	header("Location:index.php");
?>
