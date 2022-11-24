<?php

	function conectar($base)
	{
		try
		{
			$conexion = new PDO("mysqli:host=localhost;dbname=" . $base, "root", "");
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return ($conexion);
		}
		catch(PDOException $er)
		{
			echo $er->getMessage();
		}
	}

	function insertar($base, $sql)
	{
		$conexion = conectar($base);
		$todo_bien = true;

		$conexion->beginTransaction($sql);
		if ($conexion->exec($sql) == 0)
		{
			$todo_bien = false;
		}
		if ($todo_bien == true)
		{
			$conexion->commit();
			print("<p>Los cambios se han realizado correctamente</p>");
		}
		else
		{
			$conexion->rollback();
			print("<p>Error: No se han podido realizar cambios</p>");
		}
		unset($conexion);
	}

	function operarConsulta($base, $query)
	{
		$conexion = conectar($base);
		$conexion -> query($query) or die("ERROR");
		$conexion -> close();
	}

?>