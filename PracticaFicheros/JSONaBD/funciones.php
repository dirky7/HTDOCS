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

//Crea un JSON string
function crearJSON($base){
	
}

//Visualizar tabla JSON
function visualizarTablaJSON(){
	$datos_miembros = file_get_contents("miembros.json");
	$json_miembros = json_decode($datos_miembros, true);

	foreach ($json_miembros as $miembro)
	{
		echo "<tr>";
		echo "<td>" . $miembro['nombre'] . "</td>";
		echo "<td>" . $miembro['email'] . "</td>";
		echo "<td>" . $miembro['telefono'] . "</td>";
		echo "<td>" . $miembro['creado'] . "</td>";
		echo "<td>" . $miembro['estado'] . "</td>";
		echo "</tr>";
	}
}
//Escribir CSV en BD Controlador
function insertarCSV_BD($id,$nombre,$email,$telefono,$creado,$estado){
	
}
//Escribir CSV en BD
function escribirCSVBD($fichero){
	
}
//Escribir JSON en BD Controlador
function insertarJSON_BD($id,$nombre,$email,$telefono,$creado,$estado){
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
}
//Escribir JSON en BD
function escribirJSONBD($fichero){
	$datos_miembros = file_get_contents("miembros.json");
	$json_miembros = json_decode($datos_miembros, true);

	foreach ($json_miembros as $miembro)
	{
		$id = $miembro['id'];
		$nombre = $miembro['nombre'];
		$email = $miembro['email'];
		$telefono = $miembro['telefono'];
		$creado = $miembro['creado'];
		$estado = $miembro['estado'];

		operacionesCSV_BD($id, $nombre, $email, $telefono, $creado, $estado);
	}
}
?>