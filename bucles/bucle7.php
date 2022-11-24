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
		$count_pass = 0;
		$nbr = 0;
		print(" --- Notas --<br>");
		while ($i <= 10) {
			$nbr = rand(1, 10);
			print($nbr . " ");
			if ($nbr >= 7)
				$count_pass++;
			$i++;
		}
		print("<br><br>Notas superiores a 7: " . $count_pass . "<br>");
		print("Notas inferiores a 7: " . (($count_pass - 10) * -1));
	?>
</body>
</html>