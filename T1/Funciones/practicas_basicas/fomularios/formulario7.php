<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<title>Formulario 7 - DHP</title>
</head>
<body>
	<h1>Repetir palabras</h1>
	<form action="./formulario7.php" method="get">
		<p>
			<label for="frase">Frase:</label>
			<input type="text" name="frase" id="frase">
		</p>
		<p>
			<label for="caracter">Caracter:</label>
			<input type="text" name="caracter" id="caracter" maxlength="1">
		</p>
		<p>
			<label for="reps">Repeticiones:</label>
			<input type="text" name="reps" id="reps">
		</p>
		<input type="submit" value="Repetir">
	</form>
	<?php
		if (isset($_GET['frase']) && isset($_GET['caracter']) && isset($_GET['reps']))
		{
			if (is_numeric($_GET['reps']))
			{
				$frase = $_GET['frase'];
				$frase_char = str_split($frase);
				$reps = $_GET['reps'];
				$caracter = $_GET['caracter'];
				$resultado = "<p>";
				$i = 0;
				while ($i < count($frase_char))
				{
					if ($frase_char[$i] == $caracter)
					{
						$j = 0;
						while ($j < $reps)
						{
							$resultado .= $caracter;
							$j += 1;
						}
					}
					else{
						$resultado .= $frase_char[$i];
					}
					$i += 1;
				}
				$resultado .= "</p>";
				print($resultado);
			}
		}
	?>
</body>
</html>