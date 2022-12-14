<?php
	function conectar($base)
	{
		$conexion = mysqli_connect("localhost", "root", "", $base) or die("Problemas");
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
			echo "<td>".$reg['email']."</td>";
			echo "</tr>";

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
		}
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
?>


<?php
	$name_error = "";
	$email_error = "";

	if (isset($_REQUEST['nombre']))
	{
		$name = $_REQUEST['nombre'];
	}
	else
	{
		$name = "";
	}
	if (isset($_REQUEST['mail']))
	{
		$mail = $_REQUEST['mail'];
	}
	else
	{
		$mail = "";
	}
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if (empty($_POST['nombre']))
		{
			$name_error = "Introduce el nombre";
		}
		else
		{
			$name = text_input($_POST['nombre']);
			if (!preg_match("/^[a-z,A-Z]*$", $name))
			{
				$name_error = "Solo letras y espacios en blanco";
			}
		}
	}
	if (empty($_POST['mail']))
	{
		$email_error = "Introduce email";
	}
	else
	{
		if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
		{
			$email_error = "Formato incorrecto";
		}
	}
	
?>