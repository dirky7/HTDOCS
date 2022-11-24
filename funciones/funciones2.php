<?php
	function validar_fecha($day, $month)
	{
		switch ($month) {
			case 2:
			{
				if ($day > 28)
				{
					$day = rand(1, 28);
				}
				break;
			}
			case 4:
			case 6:
			case 9:
			case 11:
			{
				if ($day == 31)
				{
					$day = rand(1,30);
				}
				break;
			}
		}
		return ($day);
	}
	function escribir_fecha($day, $month, $year)
	{
		$day = validar_fecha($day, $month);
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
		print("La fecha es " . $day . " de " . $real_month . " de " . $year);
	}
?>