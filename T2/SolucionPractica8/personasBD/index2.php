<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
	<?php
	include("funciones.php");
	//insertar datos
	if (isset($_POST['cr'])) {
		if (!empty($_POST['Nom']) && !empty($_POST['Ape'] && !empty($_POST['Dir']))) {
			$nom = $_POST['Nom'];
			$ape = $_POST['Ape'];
			$dir = $_POST['Dir'];

			$base = "alumnos";
			$query = "insert into dwes_alumnos(nombre,apellido,direccion)values('$nom','$ape','$dir')";
			insertar($query, $base);
			header("Location:index.php");
		}
	}
	//Listado de datos
	$conexion = conectar("alumnos");
	$query = "select * from dwes_alumnos";
	$registros = $conexion->query($query) or die($conexion->error);
	?>

	<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
			while ($reg = $registros->fetch()) {
			?>

				<tr>
					<td><?php echo $reg['id']; ?></td>
					<td><?php echo $reg['nombre']; ?></td>
					<td><?php echo $reg['apellido']; ?></td>
					<td><?php echo $reg['direccion']; ?></td>

					<td class="bot"><a href="borrar.php?id=<?php echo $reg['id']; ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
					<td class='bot'><a href="editar.php?id=<?php echo $reg['id']; ?>&nom=<?php echo $reg['nombre']; ?>&apel=<?php echo $reg['apellido']; ?>&dir=<?php echo $reg['direccion']; ?>">
							<input type='button' name='up' id='up' value='Actualizar'></a></td>
				</tr>
			<?php
			}

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