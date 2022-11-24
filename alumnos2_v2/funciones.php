<?php

	function conectar($base)
	{
		$conexion = new mysqli("localhost", "root", "" , $base, 3306);
		return ($conexion);
	}
	function operarConsulta($base, $query)
	{
		$conexion = conectar($base);
		$conexion -> query($query) or die("ERROR");
		$conexion -> close();
	}

?>