<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<style>
		body {
			margin: 5%;
		}
		table, tr, td {
			border: 2px solid black;
		}
		tr, td {
			padding: 10px;
		}
	</style>
	<title>Document</title>
</head>
<body>
	<?php
		include "operaciones.php";
		$n1 = $_GET["n1"];
		$n2 = $_GET["n2"];
		$fila1 = 
		"
			<table>
				<tr>
					<td>Numero 1</td>
					<td>Numero 2</td>
		";
		$fila2 = 
		"
				<tr>
					<td>" . $n1 . "</td>
					<td>" . $n2 . "</td>
		";
		if (isset($_REQUEST["op"]))
			if ($_REQUEST["op"] == "suma")
			{
				$fila1 .= "<td>Suma</td>";
				$fila2 .= "<td>" . suma($n1, $n2) . "</td>";
			}
			else
			{
				$fila1 .= "<td>Resta</td>";
				$fila2 .= "<td>" . resta($n1, $n2) . "</td>";
			}

		if (isset($_REQUEST["factorial"]))
		{
			if ($_REQUEST["factorial"])
			{
				$fila1 .= "<td>Factorial de " . $n1 . "</td>";
				$fila2 .= "<td>" . factorial($n1) . "</td>";
				$fila1 .= "<td>Factorial de " . $n2 . "</td>";
				$fila2 .= "<td>" . factorial($n2) . "</td>";
			}
		}
		if (isset($_REQUEST["multiplicar"]))
		{
			if ($_REQUEST["multiplicar"])
			{
				$fila1 .= "<td>Tabla de " . $n1 . "</td>";
				$fila2 .= "<td>" . tabla_multiplicar($n1) . "</td>";
				$fila1 .= "<td>Tabla de " . $n2 . "</td>";
				$fila2 .= "<td>" . tabla_multiplicar($n2) . "</td>";
			}
		}
		if ($_REQUEST["mayormenor"] == "mayor")
		{
			$fila1 .= "<td>Mayor</td>";
			$fila2 .= "<td>" . mayor($n1, $n2) . "</td>";
		}
		else
		{
			$fila1 .= "<td>Menor</td>";
			$fila2 .= "<td>" . menor($n1, $n2) . "</td>";
		}
		$fila1 .= "</tr>";
		$fila2 .= "</tr></table>";
		print($fila1 . $fila2);
	?>
</body>
</html>