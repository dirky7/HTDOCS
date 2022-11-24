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
		$random = rand(1, 100);
		$i = 1;
		while ($i < $random)
		{
			print($i . " ");
			$i++;
		}
	?>
</body>
</html>