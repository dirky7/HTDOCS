<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Actualizar CRUD JSON</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<?php
		$filename = "miembros.json";
		if (isset($_POST['btnadd']) )
		{
			$data = file_get_contents($filename);
			$data = json_decode($data, true);

			$add_array = array(
				'id' => $_POST['txtid'],
				'nombre' => $_POST['txtnombre'],
				'email' => $_POST['txtemail'],
				'telefono' => $_POST['txtelefono'],
				'creado' => $_POST['txtfecha'],
				'estado' => $_POST['txtestado']
			);
		}

		if (buscar_id($data, $_POST['txtid']))
		{
			$data[] = $add_array;
			$data = json_encode($data, JSON_PRETTY_PRINT);
			file_put_contents($filename, $data);
			header("Location:index.html");
		}
		else
		{
			echo "id repetido";
		}


		 
	?>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Modificar Miembros</h2>
			</div>
			<form method="post" name="frmAdd">
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Identificador</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Creado</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" name="txtid" value=""> </td>
								<td><input type="text" name="txtnombre" value=""> </td>
								<td><input type="text" name="txtemail" value=""> </td>
								<td><input type="text" name="txtelefono" value=""> </td>
								<td><input type="datetime-local" name="txtFecha" value=">"> </td>
								<td>
									<select name="textestado">
										<option value="1">Activo</option>
										<option value="0">Inactivo</option>
									</select>
								</td>

							</tr>
							<tr>
								<td colspan="5"></td>
								<td><input type="submit" value="Actualizar" name="btnUpdate"> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
	<?php
	
		function buscar_id($data, $id)
		{
			foreach($data as $miembro)
			{
				if ($miembro['id'] == $id)
				{
					return (true);
				}
			}
			return (false);
		}

	?>
</body>
</html>