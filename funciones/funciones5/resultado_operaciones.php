<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		include "operaciones.php";
		$n1 = $_GET["n1"];
		$n2 = $_GET["n2"];
		if ($_REQUEST["op"] == "suma")
		{
			print("El resultado es: " . suma($n1, $n2) . "<br>");
		}
		else
		{
			print("El resultado es: " . resta($n1, $n2) . "<br>");
		}

		if (isset($_REQUEST["factorial"]))
		{
			if ($_REQUEST["factorial"])
			{
				print("El factorial de ". $n1 . ": " . factorial($n1) . "<br>");
				print("El factorial de ". $n2 . ": " . factorial($n2) . "<br>");
			}
		}
		if (isset($_REQUEST["multiplicar"]))
		{
			if ($_REQUEST["multiplicar"])
			{
				print(tabla_multiplicar($n1) . "<br>");
				print(tabla_multiplicar($n2) . "<br>");
			}
		}
		if ($_REQUEST["mayormenor"] == "mayor")
		{
			print("El numero mayor es: " . mayor($n1, $n2) . "<br>");
		}
		else
		{
			print("El numero menor es: " . menor($n1, $n2) . "<br>");
		}

	?>
</body>
</html>