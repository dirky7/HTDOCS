<html>
<head>
<title>Pruebas</title>
</head>
<body>
<form action="" method="post">
	<fieldset>
		<label>Fila:<input type="number" name="fila"></label>
		<label>Columna:<input type="number" name="columna"></label>
		<input type="submit" name="crear" value="Crear Objeto">
	</fieldset>
	<fieldset>
		<label>PosX:<input type="number" name="posX"></label>
		<label>PosY:<input type="number" name="posY"></label>
		<label>Valor:<input type="number" name="valor"></label>
		<label>ColorFondo:<input type="color" name="colFondo"></label>
		<label>ColorTexto:<input type="color" name="colTexto"></label>
		<input type="submit" name="colocar" value="Colocar Valor">
	</fieldset>
</form>
<?php
	require_once("Tabla.php");
	session_start();
	if (!isset($_SESSION['tabla']) && isset($_POST['crear'])){
		$tabla=new Tabla($_POST['fila'],$_POST['columna']);
		$_SESSION['tabla']=$tabla;
	}
	if (isset($_SESSION['tabla']) && isset($_POST['colocar'])){
		$tabla=$_SESSION['tabla'];
		$tabla->cargar($_POST['posX'],$_POST['posY'],$_POST['valor'],$_POST['colFondo'],$_POST['colTexto']);
		$_SESSION['tabla']=$tabla;
		$tabla->graficar();
	}
?>
</body>
</html>