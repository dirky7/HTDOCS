<?php
function conexion_bd($base){
    
    
}//fin de conexion_bd

//Crea un JSON string
function crearJSON($base){
	
}

//Visualizar tabla csv
function visualizarTablaCSV(){
	
}
//Visualizar tabla JSON
function visualizarTablaJSON(){
	if (!file_exists("miembros.json"))
	{
		echo "<tr><td colspan='5'>El fichero no existia y se ha creado</td></tr>";
		$fichero = fopen("miembros.json", "w");
		$texto = "[]";
		fwrite($fichero, $texto);
		fclose($fichero);
	}
	else
	{
		$datos_miembros = file_get_contents("miembros.json");
		$json_miembros = json_decode($datos_miembros, true);
		$i = 0;
		foreach ($json_miembros as $miembro)
		{
			echo "<tr>";
			echo "<td>" . $miembro['nombre'] . "</td>";
			echo "<td>" . $miembro['email'] . "</td>";
			echo "<td>" . $miembro['telefono'] . "</td>";
			echo "<td>" . $miembro['creado'] . "</td>";
			echo "<td>" . $miembro['estado'] . "</td>";
			echo "<td>
				<a href='' style='margin-left: 10px;' class='btn btn-success pull-right'>Borrar</a>
				<a href='update.php?edit_id=$i' class='btn btn-success pull-right'>Actualizar</a>
			</td>";
			echo "</tr>";
			$i++;
		}
	}
}
//Visualizar tabla JSON sin Miembros
function visualizarTablaJSON2(){
	
}
//Escribir CSV en BD Controlador
function insertarCSV_BD($id,$nombre,$email,$telefono,$creado,$estado){
	
}
//Escribir CSV en BD
function escribirCSVBD($fichero){
	
}
//Escribir JSON en BD Controlador
function insertarJSON_BD($id,$nombre,$email,$telefono,$creado,$estado){
	
}
//Escribir JSON en BD
function escribirJSONBD($fichero){
	
}
?>