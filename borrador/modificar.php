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
		Ingrese el E-mail del alumno:
		<input type="text" name="mail" placeholder="Introduce Email" value="">
		<span class="error">* </span>
		<br><br>
		Ingrese el Nuevo E-mail del alumno:
		<input type="text" name="mailNuevo" placeholder="Introduce Email" value="">
		<span class="error">* </span>
		<br><br>
		<input type="submit" name="submit" value="Modificar">  
		<input type="reset" value="Limpiar">
	</form>
<?php
	if (isset($_REQUEST['mail']) && isset($_REQUEST['mailNuevo']))
	{
		$base = "alumnos";
		$mail_actual = $_REQUEST['mail'];
		$mail_nuevo = $_REQUEST['mailNuevo'];
		$query = "UPDATE alumnos SET mail = '$mail_nuevo' WHERE mail = '$mail_actual'";
		modificar($base, $query);
	}
 ?>
 
</body>

</html>