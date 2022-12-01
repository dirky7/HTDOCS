<?php
function conexion_bd($base)
{
	try {
		$conexion = new PDO("mysql:host=localhost;dbname=" . $base, "root", "");
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		$error = $e->getCode();
		$mensaje = $e->getMessage();
	}
	if (isset($error)) {
		echo $mensaje;
	}

	return $conexion;
} //fin de conexion_bd

//Crea un JSON string
function crearJSON($base)
{
}

//Visualizar tabla csv
function visualizarTablaCSV()
{
	$fila = 0;
	$gestor = fopen("miembro.csv", "r");
	if ($gestor !== FALSE) {
		while (($datos = fgetcsv($gestor, 100, ",")) !== FALSE) {
			if ($fila != 0) {
				$cantidad = count($datos);
				echo "<tr>";
				for ($j = 1; $j < $cantidad; $j++) {
					echo "<td>" . $datos[$j] . "</td>";
				}
				echo "</tr>";
			}
			$fila++;
		}
		if ($fila == 0) {
			echo "<tr><td colspan='5'>No existe datos en el fichero</td></tr>";
		}
	} else {
		echo "<tr><td colspan='5'>No existe el fichero</td></tr>";
	}
	fclose($gestor);
}
//Escribir CSV en BD Controlador
function operacionesCSV_BD($id, $nombre, $email, $telefono, $creado, $estado)
{
	//Conexion a la BD
	$con = conexion_bd("test");
	$sql = "select * from miembros where id=$id";

	if ($estado == 'Activo')
		$estado = '1';
	else
		$estado = '0';
	date_default_timezone_set('Europe/Madrid');
	$fechaActual = date('y-m-d h:i:s');
	$resultado = $con->query($sql);
	if ($reg = $resultado->fetch()) {
		//Actualizamos la fecha de modificación
		$sql = "update miembros set nombre='$nombre',email='$email',telefono='$telefono',
        creado='$creado',modificado='$fechaActual',estado='$estado' where id=$id";
	} else {
		$sql = "insert into miembros(nombre,email,telefono,creado,modificado,estado) 
        values ('$nombre','$email','$telefono','$creado','$fechaActual','$estado')";
	}
	$con->exec($sql);
	unset($con);
}
//Escribir CSV en BD
function escribirCSVBD($fichero)
{
	$fila = 0;
	$gestor = fopen($fichero, "r");
	if ($gestor !== FALSE) {
		while (($datos = fgetcsv($gestor, 100, ",")) !== FALSE) {
			if ($fila != 0) {

				operacionesCSV_BD($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);
			}
			$fila++;
		}

		fclose($gestor);
	}
}
