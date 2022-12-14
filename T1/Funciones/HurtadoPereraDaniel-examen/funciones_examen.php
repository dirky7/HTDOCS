<?php

	//-------------FUNCIONES EJERCICIO 1 ------------

	function insertar_datos($nombre, $apellido, $direccion, $lista){
		if (!empty($nombre) && !empty($apellido) && !empty($direccion))
		{
			array_push($lista,$nombre);
			array_push($lista,$apellido);
			array_push($lista,$direccion);
			return ($lista);
		}
		else
		{
			return ($lista);
		}
	}

	function mostrar_tabla($lista){
			if (!empty($lista))
			{
				$filas = "";
				$j = 0;
				for($i = 0; $i < count($lista); $i += 3){
					$filas.="<tr><td>" . $j . "</td><td>" . $lista[$i] . "</td><td>" . $lista[$i+1] . "</td><td>" . $lista[$i+2] . "</td></tr>";
					$j += 1;
				}
				print($filas);
			}
	}

?>

<?php

	//-------------FUNCIONES EJERCICIO 2 ------------

	//Esta funcion crea la cabecera de la tabla y devuelve el inicio de la tabla con la cabecera
	function cabecera_tabla($col)
	{
		$i = 0;
		$flag = FALSE;
		$resultado = "<table><tr>";
		while ($i <= $col)
		{
			if ($i == 0)
			{
				$resultado .= ("<td>x</td>");
				$resultado .= ("<td>" . $i . "</td>");
			}
			else
			{
				$resultado .= ("<td>" . $i . "</td>");
			}
			$i += 1;
		}
		$resultado .= "</tr>";
		return ($resultado);
	}

	//Esta funcion crea la tabla restante y la devuelve
	function crear_tabla($row, $col)
	{
		$resultado = cabecera_tabla($col);
		$i = 0;
		while ($i <= $row)
		{
			$j = 0;
			$resultado .= "<tr>";
			while ($j <= $col)
			{
				if ($j == 0)
				{
					$resultado .= ("<td>" . $i . "</td>");
					$resultado .= ("<td>" . ($i * $j) . "</td>");
				}
				else
				{
					$resultado .= ("<td>" . ($i * $j) . "</td>");
				}
				$j += 1;
			}
			$resultado .= "</tr>";
			$i += 1;
		}
		$resultado .= "</table>";
		return ($resultado);
	}
	
	?>