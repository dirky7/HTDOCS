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
		$nbr = 0;
		$nbr_positive = 0;
		$nbr_negative = 0;
		$even = 0;
		$multiply = 0;

		for ($i=0; $i < 10 ; $i++) { 
			$nbr = rand(-100, 100);
			print($nbr . " | ");
			if ($nbr > 0)
				$nbr_positive++;
			if ($nbr % 15 == 0)
				$multiply++;
			if ($nbr % 2 == 0)
				$even++;
		}
		$nbr_negative = 10 - $nbr_positive;
		print("<br>Numeros positivos: " . $nbr_positive . "<br>");
		print("Numeros negativos: " . $nbr_negative . "<br>");
		print("Multiplos de 15: " . $multiply . "<br>");
		print("Numeros pares: " . $even . "<br>");
	?>
</body>
</html>