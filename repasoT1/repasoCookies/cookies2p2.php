<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cookies - Ejer 2 B</title>
	<style>
		body {
			color:
				<?php
					if (isset($_COOKIE['color']))
					{
						print($_COOKIE['color']);
					}
				?>
			;
		}
	</style>
</head>
<body>
	<h1>Seleccion de colores</h1>
	<label for="">Se ha elegido el color </label>
	<p>Cambio de color</p>
	<ul>
		<li>
			<a href="./cookies2p1.php">Volver atras</a>
		</li>
	</ul>

</body>
</html>