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
		if (isset($_POST['action']))
		{
			$action = $_POST['action'];
			if ($action == "Destruir")
			{
				setcookie("cookieTemporal", "", -1);
				print("Se ha destruido la cookie");
			}
			else
			{
				if ($action == "Crear")
				{
					$tiempo = $_POST['segs'];
					setcookie("cookieTemporal", time()+$tiempo, time()+$tiempo);
				}
				else
				{
					if (isset($_COOKIE['cookieTemporal']))
					{
						$tiempo_actual = time();
						if ($tiempo_actual < $_COOKIE['cookieTemporal'])
						{
							$tiempo = $_COOKIE['cookieTemporal'] - $tiempo_actual;
							print("Tiempo restante: $tiempo");
						}
						else
						{
							print("La cookie ha caducado");
						}
					}
				}
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