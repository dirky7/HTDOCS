<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 1 - DHP</title>
</head>
<body>
	<h1>Número en Inglés</h1>
	<form action="./formulario1.php" method="get">
		<p>Numero:</p>
		<input type="text" name="numero" id="numero" placeholder="Ingrese un numero del 1 al 7" size="50">
		<p>
			<input type="submit" value="Enviar">
		</p>
	</form>
	<?php
		if (isset($_GET['numero']))
		{
			if(is_numeric($_GET['numero']))
			{
				$numero = $_GET['numero'];
				switch ($numero) {
					case 1:
					{
						print("<p>One</p>");	
						break;
					}
					case 2:
					{
						print("<p>Two</p>");	
						break;
					}
					case 3:
					{
						print("<p>Three</p>");	
						break;
					}
					case 4:
					{
						print("<p>Four</p>");	
						break;
					}
					case 5:
					{
						print("<p>Five</p>");	
						break;
					}
					case 6:
					{
						print("<p>Six</p>");	
						break;
					}
					case 7:
					{
						print("<p>Seven</p>");	
						break;
					}
					
					default:
					{
						print("<p>Numero no valido</p>");
						break;
					}
				}
			}
			else
			{
				print("<p>Numero no valido</p>");
			}
		}
	?>
</body>
</html>