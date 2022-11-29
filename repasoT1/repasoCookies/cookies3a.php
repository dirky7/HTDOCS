<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cookies - Ejer 3</title>
</head>
<body>
	<?php
		if (isset($_COOKIE['action']))
		{
			if ($_COOKIE['action'] == "Comprobar")
			{
				print("Tiempo restante $_COOKIE[action]");
			}
		}
	?>
	<p>Elija una opcion:</p>
	<form action="" method="post">
		<ul>
			<li>
				Crea una cookie con una duracion de 
				<input type="number" name="segs" id="segs" min="1" max="60">
				<input type="submit" value="Crear" name="action">
			</li>
			<li>
				Comprobar la cookie
				<input type="submit" value="Comprobar" name="action">
			</li>
			<li>
				Destruir la cookie
				<input type="submit" value="Destruir" name="action">
			</li>
		</ul>
	</form>
</body>
</html>