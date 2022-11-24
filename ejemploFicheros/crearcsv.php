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
  
$array=array("pepe","1234","Juan","2222","Maria","3333");
$csv_end = "  
";  
$csv_sep = "|";  
$csv_file = "datas.csv";  
$csv="";  
$n=count($array);
for($i=0;$i<$n;$i+=2)  
{  
    $csv.=$array[$i].$csv_sep.$array[$i+1].$csv_end;
	
}  
//Generamos el csv de todos los datos  
if (!$handle = fopen($csv_file, "w")) {  
    echo "Cannot open file";  
    exit;  
}  
if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
    echo "Cannot write to file";  
    exit;  
}  
fclose($handle);  

?>
</body>
</html>