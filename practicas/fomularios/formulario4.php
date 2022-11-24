<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 4 - DHP</title>
</head>
<body>
	<h1>Ejercicio con Formulario</h1>
	<p>Ingreso un numero</p>
	<form action="./formulario4.php" method="get">
		<input type="text" name="numero">
		<p>
			<input type="submit" value="Ingresar">
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
				while ($i <= $numero)
				{
					if ($i % 2 == 0)
					{
						if ($i < $numero)
						{
							$resultado .= ($i . " - ");
						}
						else
						{
							$resultado .= $i;
						}
					}
					$i += 1;
				}
				$resultado .= "</p>";
				print($resultado);
			}
			else
			{
				$resultado .= "Numero erroneo</p>";
				print($resultado);
			}
		}
	?>
</body>
</html>