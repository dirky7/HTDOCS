<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<title>Ejercicio 2 - DHP</title>
</head>

<?php

	function mostrarTabla($lista)
	{
		if (!empty($lista))
		{			
			print"
				<table>
					<tr>
						<td>DNI</td>	
						<td>Nombre</td>	
					</tr>
			";
			foreach ($lista as $dni => $nombre) {
				print
				'
					<tr>
						<td>' . $dni . '</td>
						<td>' . $nombre . '</td>
					</tr>';
			}
			print"
				</table><br>
			";
		}
	}

	$tabla = array();

	if (isset($_REQUEST['tabla']))
	{
		$tabla = $_REQUEST['tabla'];
	}
	if (isset($_REQUEST['enviar']))
	{
		$nombre = $_REQUEST['nombre'];
		$dni = $_REQUEST['dni'];
		$tabla[$dni] = $nombre;
	}
?>
<body>
	<?php
		mostrarTabla($tabla);
	?>
	<form action="./array2.php" method="post">
		<div>
			<p>
				<label for="dni">DNI: </label>
				<input type="text" name="dni" id="dni">
			</p>
			<p>
				<label for="nombre">Nombre: </label>
				<input type="text" name="nombre" id="nombre">
			</p>
			<p>
				<input type="hidden" name="personas" value="
					<?php
					?>
				">
				<input type="submit" value="Enviar" name="enviar">
			</p>
		</div>
		<?php
			foreach ($tabla as $dni => $nombre)
			{
				echo '<input type="hidden" name="tabla[' . $dni . ']" value="'. $nombre . '">';
			}
		?>	
	</form>
</body>
</html>