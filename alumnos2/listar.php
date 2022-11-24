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
	<br><br>
	<table class="tabla">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>CodigoCurso</th>
		</tr>
	</thead>
	<tbody>
  <?php
	$base="alumnos";
	$query="select * from alumnos";
	listarAlumnos($base,$query);
  ?>
  </tbody>
  </table>
</body>

</html>