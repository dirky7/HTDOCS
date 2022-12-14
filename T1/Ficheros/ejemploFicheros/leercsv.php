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
  
if (($gestor = fopen("datas.csv", "r")) !== FALSE) {
	$fila=1;
    while (($datos = fgetcsv($gestor, 100, "|")) !== FALSE) {
        $numero = count($datos);
        echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        $fila++;
        for ($c=0; $c < $numero; $c++) {
            echo $datos[$c] . "<br />\n";
			
        }
		//$texto=$datos[0];
		//echo $texto." ".$datos[1]."<br>";
    }
    fclose($gestor);
}
?>
</body>
</html>