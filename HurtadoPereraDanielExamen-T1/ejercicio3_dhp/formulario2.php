<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 2 - DHP</title>
</head>

<?php

	session_name("datos");
	session_start();
	if (isset($_POST['form2'])) {
		$nombre = $_POST['nombre_completo'];
		$email = $_POST['email'];
		$url = $_POST['url'];
		$sexo = $_POST['sexo'];
		$_SESSION['datos'] = $nombre . "," . $email . "," . $url . "," . $sexo . ",";
		print($_SESSION['datos']);
	}
?>

<body>
	<h1>Formulario de acceso 2/2</h1>
	<form action="./formulario3.php" method="post">
		<p>
			<label for="">Convivientes en el domicilio</label>
			<input type="number" name="convivientes" id="convivientes" min="1" max="10">
		</p>
		<p>
			Aficciones:
			<p>
				<input type="checkbox" name="futbol" id="futbol">
				<label for="futbol">futbol</label>
			</p>
			<p>
				<input type="checkbox" name="baloncesto" id="baloncesto">
				<label for="baloncesto">baloncesto</label>
			</p>
			<p>
				<input type="checkbox" name="tenis" id="tenis">
				<label for="tenis">tenis</label>
			</p>
			<p>
				<input type="checkbox" name="senderismo" id="senderismo">
				<label for="senderismo">senderismo</label>
			</p>
			<p>
				<input type="checkbox" name="pesca" id="pesca">
				<label for="pesca">pesca</label>
			</p>
			<p>
				<input type="checkbox" name="natacion" id="natacion">
				<label for="natacion">natacion</label>
			</p>
		</p>
		<p>
			Menu favorito:
			<br>
			<select name="menu" id="menu">
				<option value="pam">Pollo asado con miel</option>
				<option value="rcm">Rollitos de carne con Matsutake</option>
				<option value="twt">Tallarines al estilo Wan Ton</option>
				<option value="pzf">Pizza Fungica</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Siguiente formulario" name="form3">
			<input type="reset" value="Reiniciar">
		</p>
	</form>
</body>

</html>