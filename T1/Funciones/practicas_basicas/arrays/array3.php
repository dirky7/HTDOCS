<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<title>Ejercicio 3 - PHP</title>
</head>
<body>
	<form action="./array3.php" method="post">
		<?php
			
			if (!$_POST)
			{
				print('<label for="num">¿Cuantas frutas deseas?</label>');
				print('<input type="text" name="num" id="num">');
				print('<input type="submit" value="enviar">');
			}
			else
			{
				if (isset($_POST['num']))
				{
					print('<form action="./array3.php" method="post">');
					$num = $_POST['num'];
					$i = 0;
					while ($i < $num) {
						print("Fruta " . $i . ": ");
						print('<input type="text" name="fruta[]" value=""><br>');
						$i += 1;
					}
					print('<br><input type="submit" value="enviar">');
					print('</form>');
				}
				else
				{
					foreach ($_POST['fruta'] as $fruta) {
						print("<p>Fruta recibida: $fruta</p>");
					}
				}
			}
		?>
	</form>
</body>
</html>