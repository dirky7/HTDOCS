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

function visualizar_tabla($base)
{
	$con=conexion_bd($base);
	$consulta = "SELECT * FROM miembros";
	$query = $con->query($consulta);

	if ($query)
	{
		$row = $query->fetch();
		while($row != null)
		{
			echo "<tr>";
			echo "<td>". $row['nombre'] . "</td>";
			echo "<td>". $row['email'] . "</td>";
			echo "<td>". $row['telefono'] . "</td>";
			echo "<td>". $row['creado'] . "</td>";
			echo "<td>". $row['modificado'] . "</td>";
			if ($row['estado'] == 1)
			{
				echo "<td>Activo</td>";
			}
			else
			{
				echo "<td>Inactivo</td>";
			}
			echo "</tr>";
			$row = $query->fetch();
		}
		unset($con);
	}
	else
	{
		echo "<tr><td colspan='5'>No se han encontrado miembros</td></tr>";
	}
}