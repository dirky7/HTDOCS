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
	<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		Nombre: <input type="text" name="nombre" placeholder="Introduce nombre" value="" autofocus>
		<span class="error">* </span>
		<br><br>
		E-mail: <input type="text" name="mail" placeholder="Introduce Email" value="">
		<span class="error">* </span>
		<br>
		<br>
		Seleccione el curso:
		<select name="codigocurso">
			<option value="1">PHP</option>
			<option value="2">ASP</option>
			<option value="3">JSP</option>
		</select>
		<br>
		<br>
		<input type="submit" name="submit" value="Enviar">  
		<input type="reset" value="Restaurar">
	</form>
	<?php

	?>
 
</body>

</html>