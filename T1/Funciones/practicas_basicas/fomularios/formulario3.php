<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<title>Formulario 3 - DHP</title>
</head>
<body>
	<h1>Ejercicio con Formulario</h1>
	<form action="./formulario3.php" method="get">
		<label for="numero">Numero:</label>
		<br>
		<input type="text" name="numero" id="numero">
		<p>
			<input type="submit" value="Ingresar">
		</p>
	</form>
	<?php
		if (isset($_GET['numero']))
			if (is_numeric($_GET['numero']))
			{
				$numero = $_GET['numero'];
				$resultado = "<table class = \"table\">";
				$resultado .= "
				<tr>
					<th>Numero</th>
					<th>Cuadrado</th>
					<th>Cubo</th>
				</tr>
				";
				$i = 1;
				while ($i <= $numero)
				{
					$resultado .= "<tr>";
					$resultado .= ("<td>" . $i . "</td>");
					$resultado .= ("<td>" . pow($i, 2) . "</td>");
					$resultado .= ("<td>" . pow($i, 3) . "</td>");
					$resultado .= "</tr>";
					$i += 1;
				}
				$resultado .= "</table>";
				print($resultado);
			}
	?>
</body>
</html>