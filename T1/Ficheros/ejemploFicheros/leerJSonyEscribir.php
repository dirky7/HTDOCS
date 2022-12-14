<!doctype html>
<html>
<head>
  <title>Autoevaluacion</title> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php

//Leemos el JSON
$datos_clientes = file_get_contents("products.json");
$json_clientes = json_decode($datos_clientes, true);
print_r($json_clientes);
$json_string = json_encode($json_clientes);
$file = 'clientes2.json';
file_put_contents($file, $json_string);

?>
</body>
</html>