<?php
	function conectar($base)
	{
		$conexion = mysqli_connect("localhost", "root", "", "alumnos") or die("Problemas");
		return ($conexion);
	}

	function listarAlumnos($base, $query)
	{
		$conexion = conectar($base);
		$registros = mysqli_query($conexion, $query) or die("Problemas");
		while ($reg = mysqli_fetch_array($registros))
		{
			echo "<tr>";
			echo "<td>".$reg['codigo']."</td>";
			echo "<td>".$reg['nombre']."</td>";
			echo "<td>".$reg['mail']."</td>";

			switch ($reg['codigocurso'])
			{
				case 1:
				{
					echo "<td>PHP</td>";
					break;
				}
				case 2:
				{
					echo "<td>ASP</td>";
					break;
				}
				case 3:
				{
					echo "<td>JSP</td>";
					break;
				}
			}
			echo "</tr>";
		}
		mysqli_close ($conexion);
	}

	function insertar($query, $base)
	{
		$conexion = conectar($base);
		mysqli_query($conexion, $query) or die("Problemas" . mysqli_error($conexion));
		mysqli_close($conexion);
	}

	function text_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return ($data);
	}

	function modificar($base, $query)
	{
		$conexion = conectar($base);
		mysqli_query($conexion, $query) or die("Problemas" . mysqli_error($conexion));
		mysqli_close($conexion);
	}
?>