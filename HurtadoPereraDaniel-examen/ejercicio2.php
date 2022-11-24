<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		table
		{
			border-collapse: collapse;
			text-align: center;
		}

		table tr:first-of-type>td
		{
			background-color: blue;
			color: white;
		}

		td
		{
			border: 1px solid black;
			padding: 5px 10px 5px 10px;
		}

		tr>td:first-of-type
		{
			background-color: orange;
		}
	</style>
	<title>Ejercicio 2 - DHP</title>
</head>
<body>
	<h2>Daniel Hurtado Perera - Ejercicio 2</h2>
	<?php
		include "funciones_examen.php";
		$row = rand(5, 15);
		$col = rand(5, 15);

		print(crear_tabla($row, $col));
	?>
</body>
</html>