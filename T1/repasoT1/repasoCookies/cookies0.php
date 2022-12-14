<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cookies - Ejer 0</title>
</head>

<body>
	<?php
	$accesosPagina = 0;
	if (isset($_COOKIE['accesos']))
	{
		$accesosPagina = $_COOKIE['accesos']; // recuperamos una cookie
		setcookie('accesos', ++$accesosPagina); // le asignamos un valor
	}

	?>
	<label for="">Contador de visitas:
		<?php
			if (isset($_COOKIE['accesos']))
			{
				print($_COOKIE['accesos']);
			}
			else
			{
				setcookie('accesos', 0);
				print($_COOKIE['accesos']);
			}
		?>
	</label>
</body>

</html>