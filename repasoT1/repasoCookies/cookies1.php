<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cookies - Ejer 1</title>
</head>
<body>
	<?php
		if (isset($_POST['reboot']))
		{
			setcookie('accesos1', 0, time()-3600);
		}
		else
		{
			$accesosPagina = 0;
			if (isset($_COOKIE['accesos1']))
			{
				$accesosPagina = $_COOKIE['accesos1']; // recuperamos una cookie
				setcookie('accesos1', ++$accesosPagina); // le asignamos un valor
			}
		}
	?>
	<?php
		if (isset($_COOKIE['accesos1']))
		{
			print("Contador de visitas:" . $_COOKIE['accesos1']);
		}
		else
		{
			setcookie('accesos1', 0);
			print("Esta es su primera visita");
		}
	?>
	<form action="" method="post">
		<input type="submit" value="Reiniciar" name="reboot">
	</form>
</body>
</html>