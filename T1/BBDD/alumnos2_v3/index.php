<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

	<?php
		include "funciones.php";

		$pagina_size = 4;

		if (isset($_GET['pagina']))
		{
			if ($_GET['pagina'] == 1)
			{
				header("Location:index.php");
			}
			else
			{
				$pagina = $_GET['pagina'];
			}
		}
		else
		{
			$pagina = 1;
		}

		$empezar_desde = ($pagina - 1) * $pagina_size;

		$conexion = conectar("alumnos");

		$query = "SELECT * FROM dwes_alumnos";
		$registro = $conexion->query("SELECT * FROM dwes_alumnos") or die("ERROR");
		$num_filas = $registro->rowCount();

		if (isset($_POST['cr']))
		{
			if (!empty($_POST['Nom']) && !empty($_POST['Ape']) && !empty($_POST['Dir']))
			{
				$nombre = $_POST['Nom'];
				$apellido = $_POST['Ape'];
				$direccion = $_POST['Dir'];
	
				$base = "alumnos";
				$query = "INSERT INTO dwes_alumnos(nombre, apellido, direccion) VALUES('$nombre', '$apellido', '$direccion')";
				operarConsulta($base, $query);
				header("Location:index.php");
			}
		}
	?>

	<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
	<form action="./index.php" method="post">
		<table width="50%" border="0" align="center">
			<tr>
				<td class="primera_fila">Id</td>
				<td class="primera_fila">Nombre</td>
				<td class="primera_fila">Apellido</td>
				<td class="primera_fila">Dirección</td>
				<td class="sin">&nbsp;</td>
				<td class="sin">&nbsp;</td>
				<td class="sin">&nbsp;</td>
			</tr>
	
			<?php
			
				while ($reg = $registro->fetch())
				{
			?>
	
			<tr>
				<td><?php echo $reg['id'];?></td>
				<td><?php echo $reg['nombre'];?></td>
				<td><?php echo $reg['apellido'];?></td>
				<td><?php echo $reg['direccion'];?></td>
	
				<td class="bot">
					<a href="borrar.php?id=<?php echo $reg['id'];?>">
						<input type='button' name='del' id='del' value='Borrar'>
					</a>
				</td>
				<td class='bot'>
					<a href="
						editar.php?
						id=<?php echo $reg['id'];?>
						&nom=<?php echo $reg['nombre'];?>
						&ape=<?php echo $reg['apellido'];?>
						&dir=<?php echo $reg['direccion'];?>">

						<input type='button' name='up' id='up' value='Actualizar'>
					</a>
				</td>
			</tr>
			<?php
				}
				unset($conexion);
			?>
			<tr>
				<td></td>
				<td><input type='text' name='Nom' size='10' class='centrado'></td>
				<td><input type='text' name='Ape' size='10' class='centrado'></td>
				<td><input type='text' name=' Dir' size='10' class='centrado'></td>
				<td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
			</tr>
		</table>
	</form>
	<p>&nbsp;</p>
</body>

</html>