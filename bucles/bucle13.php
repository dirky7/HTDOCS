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
		$nbr_high = 0;
		$nbr_low = 10;
		$nbr = 0;
		$a = 1;

		while ($a <= 10) {
			$nbr = rand(1,10);
			print($nbr . "<br>");
			if ($nbr > $nbr_high)
				$nbr_high = $nbr;
			if ($nbr < $nbr_low)
				$nbr_low = $nbr;
			$a++;
		}
		print("<br>Mejor: " . $nbr_high . "<br>");
		print("<br>Peor: " . $nbr_low . "<br>");
	?>
</body>
</html>