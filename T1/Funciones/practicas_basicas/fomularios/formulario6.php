<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<title>Formulario 6 - DHP</title>
</head>
<body>
	<h1>Ejercicios con Formularios</h1>
	<form action="./formulario6.php">
		<p>
			<label for="n1">Ingreser el valor 1:</label>
			<br>
			<input type="text" name="n1" id="n1">
		</p>
		<p>
			<label for="n2">Ingreser el valor 2:</label>
			<br>
			<input type="text" name="n2" id="n2">
		</p>
		<p>
			<label for="n3">Ingreser el valor 3:</label>
			<br>
			<input type="text" name="n3" id="n3">
		</p>
		<p>
			<label for="n4">Ingreser el valor 4:</label>
			<br>
			<input type="text" name="n4" id="n4">
		</p>
		<p>
			<label for="n5">Ingreser el valor 5:</label>
			<br>
			<input type="text" name="n5" id="n5">
		</p>
		<p>
			<input type="submit" value="Enviar">
		</p>
	</form>
	<?php
		if (isset($_GET['n1']) && isset($_GET['n2']) && isset($_GET['n3']) && isset($_GET['n4']) && isset($_GET['n5']))
		{
			if (is_numeric($_GET['n1']) && is_numeric($_GET['n2']) && is_numeric($_GET['n3']) && is_numeric($_GET['n4']) && is_numeric($_GET['n5']))
			{
				$i = 0;
				$n1 = $_GET['n1'];
				$n2 = $_GET['n2'];
				$n3 = $_GET['n3'];
				$n4 = $_GET['n4'];
				$n5 = $_GET['n5']; 
				$numeros = array($n1, $n2, $n3, $n4, $n5);
				$resultado = "<table class = \"table\">";
				$resultado .= "
				<tr>
					<th>Operacion</th>
					<th>Resultado</th>
				</tr>
				";
				while ($i < 4)
				{
					$resultado .= "<tr>";
					switch ($i) {
						case 0:
						{
							$resultado .= "<td>SUMA</td>";
							$resultado .= "<td>" . ($n1 + $n2 + $n3 + $n4 + $n5) . "</td>";
							break;
						}
						case 1:
						{
							$resultado .= "<td>MULTIPLICACIÓN</td>";
							$resultado .= "<td>" . ($n1 * $n2 * $n3 * $n4 * $n5) . "</td>";
							break;
						}
						case 2:
						{
							$resultado .= "<td>MAYOR</td>";
							$count = 0;
							$mayor = 0;
							while ($count < 5)
							{
								if ($mayor <= $numeros[$count])
								{
									$mayor = $numeros[$count]	;
								}
								$count += 1;
							}
							$resultado .= "<td>" . $mayor . "</td>";
							break;
						}
						case 3:
						{
							$resultado .= "<td>MENOR</td>";
							$count = 0;
							$menor = PHP_INT_MAX;
							while ($count < 5)
							{
								if ($menor >= $numeros[$count])
								{
									$menor = $numeros[$count]	;
								}
								$count += 1;
							}
							$resultado .= "<td>" . $menor . "</td>";
							break;
						}
					}
					$resultado .= "</tr>";
					$i += 1;
				}
				$resultado .= "</table";
				print($resultado);
			}
		}
	?>
</body>
</html>