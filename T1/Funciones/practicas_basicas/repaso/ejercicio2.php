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
		$array = array();
		$i = 0;

		while ($i < 100)
		{
			$nbr = rand(1, 100);
			if ($nbr >= 50)
			{
				$array[$i] = "M";
			}
			else
			{
				$array[$i] = "F";
			}
			$i += 1;
		}

		$i = 0;
		print_R(array_count_values($array));
	?>
</body>
</html>