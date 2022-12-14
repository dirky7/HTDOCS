<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 1 - DHP</title>
	<style>
		span {
			font-size: 50px;
		}
	</style>
</head>
<body>
	<?php
		$contador = 0;
		if (isset($_POST['reboot']))
		{
			setcookie('contador', 0);
			header("Location:ejercicio1.php");
		}
		else
		{
			if (isset($_COOKIE['contador']))
			{
				$contador = $_COOKIE['contador'];
				if (isset($_POST['btn+']))
				{
					setcookie('contador', ++$contador);
					header("Location:ejercicio1.php");
				}
				if (isset($_POST['btn-']))
				{
					setcookie('contador', --$contador);
					header("Location:ejercicio1.php");
				}
			}
		}
	?>

	<form action="./ejercicio1.php" method="post">
		<input type="submit" value="-" name="btn-">
		<?php
			if (isset($_COOKIE['contador']))
			{
				print("<span>" . $_COOKIE['contador'] . "</span>");
			}
			else
			{
				setcookie('contador', 0);
				header("Location:ejercicio1.php");
				print("<span>0</span>");
			}
		?>
		<input type="submit" value="+" name="btn+">
		<p>
			<input type="submit" value="Poner a cero" name="reboot">
		</p>
	</form>

</body>
</html>