<?php
   include 'config/misfunciones.php';
   
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
  <title>Cursos</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css" >
</head>

<body>
  
  <fieldset class="scrollmenu">
      <a href="principal.php">Inicio</a>
	  <a href="insertar.php">Insertar</a>
	  <a href="listar.php">Listar</a>
	  <a href="borrar.php">Borrar</a>	
	  <a href="modificar.php">Modificar</a>
    </fieldset>  
	
	<p><span class="error">* required field</span></p>
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  
  Ingrese el E-mail a borrar: <input type="text" name="mail" placeholder="Introduce Email" value="">
  <span class="error"></span>
  <br><br>
  <input type="submit" name="submit" value="Borrar">  
  <input type="reset" value="Limpiar">
</form>
<?php

 ?>
 
</body>

</html>