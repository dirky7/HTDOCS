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
			$nbr = 2;
			while ($nbr <= 100) {
				print($nbr . " ");
				$nbr += 2;
			}
		?>
	</p>
</body>
</html>