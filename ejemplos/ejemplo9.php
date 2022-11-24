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
			$real_month = "";
			$day = date("d");
			$month = date("m");
			$year = date("Y");
			switch ($month)
			{
				case 1:
				{
					$real_month = "Enero";
					break;
				}
				case 2:
				{
					$real_month = "Febrero";
					break;
				}
				case 3:
				{
					$real_month = "Marzo";
					break;
				}
				case 4:
				{
					$real_month = "Abril";
					break;
				}
				case 5:
				{
					$real_month = "Mayo";
					break;
				}
				case 6:
				{
					$real_month = "Junio";
					break;
				}
				case 7:
				{
					$real_month = "Julio";
					break;
				}
				case 8:
				{
					$real_month = "Agosto";
					break;
				}
				case 9:
				{
					$real_month = "Septiembre";
					break;
				}
				case 10:
				{
					$real_month = "Octubre";
					break;
				}
				case 11:
				{
					$real_month = "Noviembre";
					break;
				}
				case 12:
				{
					$real_month = "Diciembre";
					break;
				}
			}
			print("Hoy es " . $day . " de " . $real_month . " de " . $year);
		?>
	</p>
</body>
</html>