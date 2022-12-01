<?php
function conexion_bd($base){
    try{
		$conexion = new PDO("mysql:host=localhost;dbname=".$base, "root", "");
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
		$error = $e->getCode();
		$mensaje = $e->getMessage();

	}
	 if (isset($error)){
		echo $mensaje;
	}
	 
	 return $conexion;

}//fin de conexion_bd


//Visualizar tabla JSON
function visualizarTablaJSON(){
	$datos_miembros = file_get_contents("miembros.json");
	$json_miembros = json_decode($datos_miembros, true);
	foreach($json_miembros as $miembro){
		echo "<tr>";
		echo "<td>".$miembro['nombre']."</td>";
		echo "<td>".$miembro['email']."</td>";
		echo "<td>".$miembro['telefono']."</td>";
		echo "<td>".$miembro['creado']."</td>";
		echo "<td>".$miembro['estado']."</td>";
		echo "</tr>";
	}
	}


//Escribir CSV en BD Controlador
function operacionesJSON_BD($id,$nombre,$email,$telefono,$creado,$estado){
    //Conexion a la BD
    $con=conexion_bd("test");
    $sql="select * from miembros where id=$id";

    if($estado=='Activo')
        $estado='1';
    else
        $estado='0';
    date_default_timezone_set('Europe/Madrid');
    $fechaActual=date('y-m-d h:i:s');
    $resultado=$con->query($sql);
    if($reg=$resultado->fetch()){
        //Actualizamos la fecha de modificación
        $sql="update miembros set nombre='$nombre',email='$email',telefono='$telefono',
        creado='$creado',modificado='$fechaActual',estado='$estado' where id=$id";
    }else{
        $sql="insert into miembros(nombre,email,telefono,creado,modificado,estado) 
        values ('$nombre','$email','$telefono','$creado','$fechaActual','$estado')";
    }
    $con->exec($sql);
    unset($con);
}
//Escribir JSON en BD
function escribirJSONBD($fichero){
	$datos_miembros = file_get_contents("miembros.json");
	$json_miembros = json_decode($datos_miembros, true);
	foreach($json_miembros as $miembro){
		$id=$miembro['id'];
		$nombre=$miembro['nombre'];
		$email=$miembro['email'];
		$telefono=$miembro['telefono'];
		$creado=$miembro['creado'];
		$estado=$miembro['estado'];
		operacionesJSON_BD($id,$nombre,$email,$telefono,$creado,$estado);
		
	}
}
