<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>CRUD JSON</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<?php
	$error = "";
	if (isset($_COOKIE['mierror'])) {
		$error = $_COOKIE['mierror'];
	}
	?>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				Lista de Miembros
				<a href="add.php" class="btn btn-success pull-right">Agregar Miembros</a>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Email</th>
							<th>Telefono</th>
							<th>Creado</th>
							<th>Estado</th>
							<th>Actualizar</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "funciones.php";
						visualizarTablaJSON();

						?>
						<tr>
							<td colspan="7"><?php
											echo $error;
											setcookie('mierror', "", time() - 3600);
											?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>