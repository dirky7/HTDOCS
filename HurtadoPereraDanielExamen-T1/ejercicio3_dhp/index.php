<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 1 - DHP</title>
</head>

<?php
	session_name("datos");
	session_start()
?>

<body>
	<h1>Formulario de acceso 1/2</h1>
	<form action="./formulario2.php" method="post">
		<p>
			<label for="">Nombre y Apellidos: </label>
			<input type="text" name="nombre_completo" id="nombre_completo" required>
		</p>
		<p>
			<label for="email">Email: </label>
			<input type="email" name="email" id="email" required>
		</p>
		<p>
			<label for="url">URL Pagina personal</label>
			<input type="text" name="url" id="url" required>
		</p>
		<p>
			-Sexo-
			<p>
				<label for="h">Hombre:</label>
				<input type="radio" name="sexo" id="h" value="h" required>
			</p>
			<p>
				<label for="m">Mujer:</label>
				<input type="radio" name="sexo" id="m" value="m" required>
			</p>
		</p>
		<p>
			<input type="submit" value="Siguiente pagina" name="form2">
			<input type="reset" value="Reiniciar">
		</p>
	</form>
</body>
</html>