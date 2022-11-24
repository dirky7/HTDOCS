<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 5 - DHP</title>
</head>
<body>
	<h1>Ejercicio con Formulario</h1>
	<form action="./formulario5.php" method="get">
		<p>
			<p>
				<label for="nombre">Nombre</label>
				<br>
				<input type="text" name="nombre" id="nombre">
			</p>
			<p>
				<label for="apellidos">Apellidos</label>
				<br>
				<input type="text" name="apellidos" id="apellidos">
			</p>
			<p>
				<label for="ciudad">Ciudad</label>
				<br>
				<input type="text" name="ciudad" id="ciudad">
			</p>
			<p>
				<input type="submit" value="Ingresar">
			</p>
		</p>
	</form>
	<?php
		if(isset($_GET['nombre']) && isset($_GET['apellidos']) && isset($_GET['ciudad']))
		{
			$nombre = $_GET['nombre'];
			$apellidos = $_GET['apellidos'];
			$ciudad = $_GET['ciudad'];

			$resultado = ("<p>" . $nombre . " " . $apellidos . " vive en " . $ciudad . "</p>");
			print($resultado);
		}			
	?>
</body>
</html>