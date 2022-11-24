<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Actualizar CRUD JSON</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<?php
		include "funciones.php";
		
		$edit_id = $_GET['edit_id'];
		$data = file_get_contents("miembros.json");
		$data = json_decode($data, true);
		$row = $data[$edit_id];
		if (isset($_POST['btnUpdate']))
		{
			$filename = "miembros.json";
			if (isset($_POST['btnadd']))
			{
				$data = file_get_contents($filename);
				$data = json_decode($data, true);

				$update_array = array(
					'id' => $_POST['txtid'],
					'nombre' => $_POST['txtnombre'],
					'email' => $_POST['txtemail'],
					'telefono' => $_POST['txtelefono'],
					'creado' => date("y-m-d h:i:s"),
					'estado' => $_POST['txtestado']
				);
				$data[$edit_id] = $update_array;
				$data = json_encode($data, JSON_PRETTY_PRINT);
				$data[] = $add_array;
				file_put_contents($filename, $data);
				header("Location:index.html");
			}
			else
			{
				echo "id repetido";
			}
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
								<td>
									<input type="text" name="txtid" value="<?php echo $row['id'] ?>">
								</td>
								<td>
									<input type="text" name="txtnombre" value="<?php echo $row['nombre'] ?>">
								</td>
								<td>
									<input type="text" name="txtemail" value="<?php echo $row['email'] ?>">
								</td>
								<td>
									<input type="text" name="txtelefono" value="<?php echo $row['telefono'] ?>">
								</td>
								<td>
									<input type="datetime-local" name="txtFecha" disabled value="<?php echo $row['creado'] ?>">
								</td>
								<td>
									<select name="txtestado">
										<option value="1" <?php if(convertir_estado($row['estado']) == "1") echo "selected"?> >Activo</option>
										<option value="0" <?php if(convertir_estado($row['estado']) == "0") echo "selected"?> >Inactivo</option>
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
		function convertir_estado($estado)
		{
			if (strlen($estado) == 1)
			{
				if ($estado == "0")
				{
					$estado = "Activo";
				}
				else
				{
					$estado = "Inactivo";
				}
			}
			else
			{
				if ($estado == "Activo")
				{
					$estado = "1";
				}
				else
				{
					$estado = "0";
				}
			}
		}
	?>
</body>
</html>