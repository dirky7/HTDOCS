<?php
  function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
  
  function conectar($base){
    $conexion = new mysqli("localhost","root","",$base)or die("Problemas con la conexión");
	if ($conexion -> connect_error)
	{
		die("Problema con la base de datos");
	}
    return $conexion;
  }

  function listarAlumnos($base,$query){
    $conexion = conectar($base);
    $registros = $conexion->query($query) or die("Conexion fallida");
    while($reg=$registros->fetch_array()){
        echo "<tr>";
        echo "<td>".$reg['codigo']."</td>";
        echo "<td>".$reg['nombre']."</td>";
        echo "<td>".$reg['mail']."</td>";
       
        switch($reg['codigocurso']){
            case 1:echo "<td>PHP</td>";
                    break;
            case 2:echo "<td>ASP</td>";
                    break;
            case 3:echo "<td>JSP</td>";
                    break;
        }
        echo "</tr>";
    }
	$conexion->close();
  }
  function insertar($query,$base){
    $conexion = conectar($base);
	$conexion->query($query) or die("Muere consulta");
    $conexion->close();
  }
  function borrar($query,$mail,$base){
    $conexion = conectar($base);
    $registro = $conexion->query("select codigo,nombre from alumnos where mail='$mail'") or die("Problema en el select".mysqli_error($conexion));
    if($reg=mysqli_fetch_array($registro)){
		$conexion->query($query) or die("Problemas con el borrado".mysqli_error($conexion));
      echo "Se efectuado el borrado del alumno ".$reg['nombre'];
    }else{
      echo "No existe el alumno";
    }
    $conexion->close();
  }
  function modificar($query,$mail,$base){
    $conexion = conectar($base);
    $registro = $conexion->query("select codigo,nombre from alumnos where mail='$mail'") or die("Problema en el select".mysqli_error($conexion));
    if($reg=mysqli_fetch_array($registro)){
      mysqli_query($conexion,$query)or die("Problemas con la actualización".mysqli_error($conexion));
      echo "Se efectuado la actualizacion del alumno ".$reg['nombre'];
    }else{
      echo "No existe el alumno";
    }
    $conexion->close();
  }
?>