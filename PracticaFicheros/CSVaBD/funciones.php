<?php
function conexion_bd($base){
    
	try
	{
		$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$dsn = "mysql:host=localhost;dbname=$base";
		$con = new PDO($dsn, "root", "", $opc);
		return ($con);
	}
	catch (PDOException $er)
	{
		$error = $er->getCode();
		$anuncio = $er->getMessage();
		die("Error" . $anuncio . " " . $error);
	}
}//fin de conexion_bd

function visualizarTablaCSV($base)
{
	$fila = 0;
	$gestor = fopen("miembro.csv", "r");
	if ($gestor != false)
	{
		while (($datos = fgetcsv($gestor, 100, ",")) != false)
		{
			if ($fila != 0)
			{
				$cantidad = count($datos);
				echo "<tr>";
				$i = 0;
				while ($i < $cantidad)
				{
					echo "<td>" . $datos[$i] . "</td>";
				}
				echo "</tr>";
			}
			$fila++;
		}
		if ($fila == 0)
		{
			echo "<tr><td colspan='5'>No se han encontrado miembros</td></tr>";
		}
		else
		{
			echo "<tr><td colspan='5'>No se han encontrado miembros</td></tr>";
		}
		fclose($gestor);
	}
}

//Crea un JSON string
function crearJSON($base){
	
}

//Escribir CSV en BD Controlador
function operacionesCSV_BD($id,$nombre,$email,$telefono,$creado,$estado)
{
	$con = conexion_bd("test");
	$sql = "SELECT * FROM miembros WHERE 'id' = $id";

	if ($estado == "Activo")
	{
		$estado = '1';
	}
	else
	{
		$estado = '0';
	}

	date_default_timezone_set("Europa/Madrid");
	$fechaActual = date("y-m-d h:i:s");
	$resultado = $con->query($sql);
	if ($reg = $resultado->fetch())
	{
		$sql = "UPDATE miembros SET 
		id = '$id',
		nombre = '$nombre',
		email = '$email',
		telefono = '$telefono', 
		creado = '$creado', 
		estado = '$estado' WHERE id = '$id'";
	}
	else
	{
		$sql = "INSERT INTO miembros(nombre, email, telefono, creado, modificado, estado) VALUES ('$nombre', '$email', '$telefono', '$creado', '$fechaActual', '$estado')";
	}
	$con->exec($sql);
	unset($con);
}
//Escribir CSV en BD
function escribirCSVBD($fichero){
	$fila = 0;
	$gestor = fopen("miembro.csv", "r");
	if ($gestor != false)
	{
		while (($datos = fgetcsv($gestor, 100, ",")) != false)
		{
			if ($fila != 0)
			{
				operacionesCSV_BD($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);
			}
			$fila++;
		}
		fclose($gestor);
	}
}
