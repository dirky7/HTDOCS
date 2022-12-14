<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="./ejercicio1.php" method="post">
		<p>
			<label for="nombre">Nombre: </label>
			<input type="text" name="nombre" id="nombre">
		</p>
		<p>
			<label for="apellido1">Primer apellido: </label>
			<input type="text" name="apellido1" id="apellido1">
		</p>
		<p>
			<label for="apellido2">Segundo apellido: </label>
			<input type="text" name="apellido2" id="apellido2">
		</p>
		<p>
			<label for="year">Año de nacimiento: </label>
			<input type="text" name="year" id="year">
		</p>
		<p>
			<label for="email">Email: </label>
			<input type="text" name="email" id="email">
		</p>
		<p>
			<input type="submit" value="Enviar">
		</p>
	</form>
	<?php
		if (isset($_POST["nombre"]))
		{
			$nombre = $_POST["nombre"];
		}
		else
		{
			$nombre = "";
		}
		if (isset($_POST["apellido1"]))
		{
			$apellido1 = $_POST["apellido1"];
		}
		else
		{
			$apellido1 = "";
		}
		if (isset($_POST["apellido2"]))
		{
			$apellido2 = $_POST["apellido2"];
		}
		else
		{
			$apellido2 = "";
		}
		if (isset($_POST["year"]))
		{
			$year = $_POST["year"];
		}
		else
		{
			$year = "";
		}
		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];
		}
		else
		{
			$email = "";
		}
		if (empty($_POST['nombre']) || empty($_POST['apellido1']) || empty($_POST['apellido2']) || empty($_POST['year']) || empty($_POST['email']))
		{
			echo "<div><p>FALTAN DATOS</p></div>";
		}
		else
		{
			$array = array();
			$array['nombre'] = $nombre;
			$array['apellido1'] = $apellido1;
			$array['apellido2'] = $apellido2;
			$array['year'] = $year;
			$array['email'] = $email;
			mostrarTabla($array);
			$nombre = $apellido1 = $apellido2 = $year = $email = "";
		}
		?>
		<?php
			function mostrarTabla($array)
			{
				if (count($array)>1){
					echo "<h1>Datos personales</h1>";
					echo "<table><tr align='center'>";
					foreach($array as $clave->$valor)
					{
						echo ("<tr><th>" . $clave . "</th><td>" . $valor . "</td></tr>");
					}
					echo "</table>";
				}
			}
		?>
</body>
</html>