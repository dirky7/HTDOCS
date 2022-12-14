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
		$i = 1;
		$nbr = 0;
		$nbr_random = 0;
		while ($i <= 10) {
			$nbr_random = rand(1, 100);
			print($nbr_random . " ");
			$nbr += $nbr_random;
			$i++;
		}
		printf("<br>");
		print("Resultado: " . ($nbr / 10));
	?>
</body>
</html>