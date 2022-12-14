<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
	@ $dwes = new mysqli("localhost", "root", "", "dwes", 3306);
	$error = $dwes->connect_errno;
	if ($error != null)
	{
		print "<p>Se ha producido el error: $dwes->connect_error.</p>";
		exit();
	}
	// Definimos una variable para comprobar la ejecución de las consultas
	$todo_bien = true;
	// Iniciamos la transacción
	$dwes->autocommit(false);
	$sql = 'UPDATE stock SET unidades=1 WHERE producto="3DSNG" AND tienda = 1';
	if ($dwes->query($sql) != true)
	{
		$todo_bien = false;
	}
	
	$sql = 'INSERT INTO `stock` (`producto`, `tienda`, `unidades`) VALUES ("3DSNG", 3, 1)';

	if ($dwes->query($sql) != true) $todo_bien = false;
	// Si todo fue bien, confirmamos los cambios
	// y en caso contrario los deshacemos
	if ($todo_bien == true)
	{
		$dwes->commit();
		print "<p>Los cambios se han realizado correctamente.</p>";
	}
	else
	{
		$dwes->rollback();
		print "<p>No se han podido realizar los cambios.</p>";
	}
	$dwes->close();
	unset($dwes);
?>

</body>
</html>