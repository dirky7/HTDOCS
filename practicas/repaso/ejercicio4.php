<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="./ejercicio4.php" method="post">
		<label for="nbr">
			Numero:
		</label>
		<input type="number" name="nbr" id="nbr">
		<input type="submit" value="Enviar">
	</form>
	<?php
		if (isset($_POST['nbr']))
		{
			if (is_numeric($_POST['nbr']))
			{
				$nbr = $_POST['nbr'];
				$i = 1;
				$j = 0;
				$i_aux = 0;
				while ($i <= $nbr)
				{
					$j = 0;
					while ($j < $nbr - $i) {
						print("0 ");
						$j += 1;
					}
					$i_aux = $i;
					$i = 1;
					while ($j < $nbr)
					{
						print($i . " ");
						$i += 1;
						$j += 1;
					}
					print("<br>");
					$i = $i_aux;
					$i += 1;
				}
			}
		}
	?>
</body>
</html>