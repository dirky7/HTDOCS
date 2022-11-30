<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Actualizar CRUD JSON</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<?php
	include 'funciones.php';
	$edit_id = $_GET['edit_id'];
	$filename = "miembros.json";
	$data = file_get_contents($filename);
	$data = json_decode($data, true);
	$row = $data[$edit_id];
	
	
	if (isset($_POST['btnUpdate'])) {
		if (!empty($_POST['txtnombre']) && !empty($_POST['txtemail']) && !empty($_POST['txtelefono'])) 
		{	
				$update_arr = array(
					'id' => $_POST['txtid'],
					'nombre' => $_POST['txtnombre'],
					'email' => $_POST['txtemail'],
					'telefono' => $_POST['txtelefono'],
					'creado' => $_POST['txtFecha'],
					'modificado' => date('y-m-d h:i:s'),
					'estado' => convertirEstado($_POST['txtestado'])
				);
				$data[$edit_id]=$update_arr;
				$data=json_encode($data,JSON_PRETTY_PRINT);
				file_put_contents($filename,$data);

		}

			header("Location:index.php");
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
								<td><input type="text" name="txtid" value="<?php echo $row['id'] ?>" readonly > </td>
								<td><input type="text" name="txtnombre" value="<?php echo $row['nombre'] ?>"> </td>
								<td><input type="text" name="txtemail" value="<?php echo $row['email'] ?>"> </td>
								<td><input type="text" name="txtelefono" value="<?php echo $row['telefono'] ?>"> </td>
								<td><input type="datetime-local" name="txtFecha" value="<?php echo $row['creado'] ?>" readonly> </td>
								<td>
									<select name="txtestado">
										<option value="1" <?php if(convertirEstado($row['estado'])=='1') echo "selected"; ?>>Activo</option>
										<option value="0" <?php if(convertirEstado($row['estado'])=='0') echo "selected"; ?>>Inactivo</option>
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


</body>

</html>