<!doctype html>
<html>

<head>
	<title>Autoevaluacion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
	<?php

	$arr_clientes = array(
		'nombre' => 'Jose', 'edad' => '20', 'genero' => 'masculino',
		'email' => 'correodejose@dominio.com', 'localidad' => 'Madrid', 'telefono' => '91000000'
	);


	//Creamos el JSON
	$json_string = json_encode($arr_clientes);
	$file = 'clientes.json';
	file_put_contents($file, $json_string);

	?>
</body>

</html>