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
function visualizarTabla($base){
    //Conectarse a la base de datos
    $con=conexion_bd($base);
    //Consulta a la base de datos
    $sql="select * from miembros";
    $query=$con->query($sql);

    //Recorremos la BD y vamos creando filas
    if($query){
        $row=$query->fetch();
        while ($row!=null){
            echo "<tr>";
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['telefono']."</td>";
            echo "<td>".$row['creado']."</td>";
            if($row['estado']==1)
                echo "<td>Activo</td>";
            else
                echo "<td>Inactivo</td>";
            echo "</tr>";
            $row=$query->fetch();

        }
        unset($con);
    }else{
        echo "<tr><td colspan='5'>No se han encontrado miembros</td></tr>";
    }


}

function crearJSON($base){
	//Conectarse a la base de datos
    $con=conexion_bd($base);
    //Consulta a la base de datos
    $sql="select * from miembros";
    $query=$con->query($sql);

    //Recorremos la BD y vamos creando filas
    if($query){
        //Condicionar nuestro array
         $data ="[]";
         $data = json_decode($data, true);

        $row=$query->fetch();
        while ($row!=null){
            $estado=($row['estado']=='1')?'Activo':'Inactivo';
            $add_arr = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'email' => $row['email'],
                'telefono' => $row['telefono'],
                'creado' => $row['creado'],
                'modificado' => $row['modificado'],
                'estado' => $estado
                );
            $data[] = $add_arr;
            $row=$query->fetch();
        }
        unset($con);
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('miembros.json', $data);
    }
}
?>