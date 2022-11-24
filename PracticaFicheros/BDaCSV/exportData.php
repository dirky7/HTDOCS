<?php
	include "funciones.php";

	$base = "test";
	$con = conexion_bd($base);
	$sql = "SELECT * FROM miembros";
	$query = $con->query($sql);

	$filename = "miembros.csv_" . date('Y-m-d') . ".csv";
	$delimitador = ",";

	if ($query)
	{
		$f = fopen('php://memory', 'w');
		$campos = array('id', 'nombre', 'email', 'telefono', 'creado', 'modificado', 'estado');

		fputcsv($f, $campos, $delimitador);

		$row = $query->fetch();
		while($row != null)
		{
			$estado = ($row['estado'] == 1)?'Activo':'Inactivo';
			$linea_datos = array($row['id'], $row['nombre'], $row['email'], $row['telefono'], $row['creado'], $row['modificado'], $estado);
			fputcsv($f, $linea_datos, $delimitador);
			$row = $query->fetch();
		}
		unset($row);
		fseek($f, 0);
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="' . $filename . '";');

		fpassthru($f);
	}

?>