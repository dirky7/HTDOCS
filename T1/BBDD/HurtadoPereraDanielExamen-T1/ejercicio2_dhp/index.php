<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 2 - DHP</title>
</head>

<?php

	session_name("azul");
	session_name("naranja");
	session_start();

?>

<body>
	<form action="./ejercicio2-2.php" method="get">
		<p>
			<input type="submit" value="Vota al partido azul" name="azul">
			<?php
				if (isset($_SESSION['azul']))
				{
					print($_SESSION['azul']);
				}
			?>
		</p>
		<p>
			<input type="submit" value="Vota al partido naranja" name="naranja">
			<?php
				if (isset($_SESSION['naranja']))
				{
					print($_SESSION['naranja']);
				}
			?>
		</p>
		<p>
			<input type="submit" value="Poner a cero" name="reboot">
		</p>
	</form>
</body>
</html>