<?php
	function suma($n1, $n2)
	{
		return ($n1 + $n2);
	}
	function resta($n1, $n2)
	{
		return ($n1 - $n2);
	}
	function factorial($nbr)
	{
		$i = 1;
		$resultado = 1;
		while ($i <= $nbr)
		{
			$resultado *= $i;
			$i++;
		}
		return ($resultado);
	}
	function tabla_multiplicar($nbr)
	{
		$i = 0;
		$resultado = "";
		while ($i <= 10)
		{
			$resultado .= ($nbr . " x " . $i . " = " . ($nbr * $i) . "<br>");
			$i++;
		}
		return ($resultado);
	}
	function mayor($n1, $n2)
	{
		if ($n1 > $n2)
			return ($n1);
		else
			return ($n2);
	}
	function menor($n1, $n2)
	{
		if ($n1 < $n2)
			return ($n1);
		else
			return ($n2);
	}
?>