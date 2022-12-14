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
        $dia = date("d");
        $servidor = "Servidor online";
        if ($dia < 10)
			$servidor = "Servidor offline";
        print($servidor);
    ?>
</body>
</html>