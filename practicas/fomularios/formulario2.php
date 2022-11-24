<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 2 - DHP</title>
</head>
<body>
	<h1>Dibujar asteriscos</h1>
	<form action="./formulario2.php" method="get">
		<p>Numero de asteriscos:</p>
		<input type="text" name="numero">

		<p>
			<p>
				<input type="radio" name="asterisco" value="asc" id="asc">
				<label for="asc">Asteriscos ascencentes</label>
			</p>
			<p>
				<input type="radio" name="asterisco" value="desc" id="desc">
				<label for="desc">Asteriscos descencentes</label>
			</p>
		</p>
		<p>
			<input type="submit" value="Mostrar">
		</p>
	</form>
	<?php
		if (isset($_GET['numero']))
		{
			$resultado = "<p>";
			if (is_numeric($_GET['numero']))
			{
				$numero = $_GET['numero'];
				$i = 0;
				$j = 0;
				if ($_REQUEST['asterisco'] == "asc")
				{
					while ($i < $numero) {
						$j = 0;
						while ($j <= $i) {
							$resultado .= "*";
							$j += 1;
						}
						$i += 1;
						$resultado .= "<br>";
					}
					$resultado .= "</p>";
					print($resultado);
				}
				else
				{
					$i = $numero;
					while ($i > 0) {
						$j = $i;
						while ($j > 0) {
							$resultado .= "*";
							$j -= 1;
						}
						$i -= 1;
						$resultado .= "<br>";
					}
					$resultado .= "</p>";
					print($resultado);
				}
			}
			else
			{
				$resultado .= "Numero no valido</p>";
				print($resultado);
			}
		}
	?>
</body>
</html>