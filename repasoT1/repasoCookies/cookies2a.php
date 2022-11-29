<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cookies - Ejer 2 A</title>
</head>
<body>
	<?php
		if (isset($_GET['color']))
		{
			setcookie("color", $_GET['color']);
		}
	?>
	<h1>Seleccion de colores</h1>
	<label for="">
		Se ha elegido el color 
		<?php
			if (isset($_COOKIE['color']))
			{
				print($_COOKIE['color']);
			}
		?>
	</label>
	<p>Cambio de color</p>
	<ul>
		<li>
			<a href="?color=red">Rojo</a>
		</li>
		<li>
			<a href="?color=green">Verde</a>
		</li>
		<li>
			<a href="?color=blue">Azul</a>
		</li>
		<li>
			<a href="?color=none">Ninguno</a>
		</li>
		<li>
			<a href="./cookies2b.php">Comprobar color</a>
		</li>
	</ul>

</body>
</html>