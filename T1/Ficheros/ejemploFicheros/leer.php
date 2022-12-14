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
	$file = "miarchivo.txt";
	$fp = fopen($file, "r");

	// filesize() nos devuelve el tamaño del archivo en cuestión
	$contents = fread($fp, filesize($file));
	echo $contents;
	// Cerramos la conexión con el archivo
	$datos = stat($file);

	$kb = $datos[7] / 1024;

	fclose($fp);
?>
</body>
</html>