<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p>
		<?php
			include "funciones2.php";
			escribir_fecha(rand(1,31), rand(1,12), rand(1950, 2022));
		?>
	</p>
</body>
</html>