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
	//  ▒▒▒▒▒▒▒▒ Escribiendo en un archivo ▒▒▒▒▒▒▒▒

	$file = "miarchivo.txt";
	$texto = "Hola que tal";

	$fp = fopen($file, "w");

	fwrite($fp, $texto);
	fclose($fp);
?>
</body>
</html>