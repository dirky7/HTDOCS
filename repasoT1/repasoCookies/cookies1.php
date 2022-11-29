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
		if (isset($_POST['reiniciar']))
		{
			setcookie('accesos1', 0, -1);
			header("Location:cookies1.php");
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
	<form action="./cookies1.php" method="post">
		<label for="">
			<?php
				if (isset($_COOKIE['accesos1']))
				{
					print("Contador de visitas:$_COOKIE[accesos1]");
				}
				else
				{
					setcookie('accesos1', 1);
					print("Esta es su primera visita");
				}
			?>
		</label>
		<br>
		<input type="submit" value="Reiniciar" name="reiniciar">
	</form>
</body>
</html>