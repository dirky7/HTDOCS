<?php

function conectar_bd(){
	try
	{
		$conexion=new PDO("mysql:host=localhost;dbname=amigos","root","");
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conexion;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

function visualizarDatos($sesion, $i)
{
	$array_sesion = explode(",", $sesion);
	if ($i == 0)
	{
		echo "<tr>";
		while($i < 6)
		{
			echo "<td>" . $array_sesion[$i] . "</td>";
			if ($i == 5)
			{
				switch ($array_sesion[$i])
				{
					case "pam":
					{
						echo "<td>Pollo asado co miel</td>";
						break;
					}
					case "rcm":
					{
						echo "<td>Rollitos de carne con Matsutake</td>";
						break;
					}
					case "twt":
					{
						echo "<td>Tallarines al estilo Wan Ton</td>";
						break;
					}
					case "pzf":
					{
						echo "<td>Pizza Fungica</td>";
						break;
					}
				}
			}
			$i++;
		}
		echo "</tr>";
	}
	else
	{
		while($i < count($array_sesion))
		{
			echo "<tr>";
			echo "<td>" . $array_sesion[0] . "</td>";
			echo "<td>" . $array_sesion[$i] . "</td>";
			echo "</tr>";
			$i++;
		}
	}
}

function visualizarTabla_bd($tabla)
{
	$con = conectar_bd();
	if ($tabla == "tb_amigos")
	{
		$sql = "SELECT * FROM $tabla";
		$query = $con->query($sql);
	
		if ($query)
		{
			$row = $query->fetch();
			while ($row != null)
			{
				echo "<tr>";
				echo "<td>" . $row['nombreYapel'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['url'] . "</td>";
				echo "<td>" . $row['sexo'] . "</td>";
				echo "<td>" . $row['convivientes'] . "</td>";
				echo "<td>" . $row['favorito'] . "</td>";
				echo "</tr>";
				$row = $query->fetch();
			}
			unset($con);
		}
		else
		{
			echo "<tr><td colspan='6'>No se han encontrado amigos</td></tr>";
		}
	}
	else
	{
		$sql = "SELECT * FROM $tabla";
		$query = $con->query($sql);
	
		if ($query)
		{
			$row = $query->fetch();
			while ($row != null)
			{
				echo "<tr>";
				echo "<td>" . $row['nombreAmigo'] . "</td>";
				echo "<td>" . $row['aficion'] . "</td>";
				echo "</tr>";
				$row = $query->fetch();
			}
			unset($con);
		}
		else
		{
			echo "<tr><td colspan='2'>No se han encontrado amigos</td></tr>";
		}
	}
}
