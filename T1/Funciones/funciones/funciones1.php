<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		function calcular_precio_iva($precio, $iva = 0.10)
		{
			return ($precio * (1 + $iva));
		}
		$precio = 5;
		print("El precio es: " . $precio);
		print("<br>Con el IVA aplicado es: " . calcular_precio_iva($precio));
	?>
</body>
</html>