<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario 3 - DHP</title>
</head>

<?php
	include "funciones.php";
	session_name("datos");
	session_start();
	if (isset($_POST['form3']))
	{
		$convivientes = $_POST['convivientes'];
		$menu = $_POST['menu'];
		$aficciones = "";
		$_SESSION['datos'] = $_SESSION['datos'] . $convivientes . "," . $menu;
		if (isset($_POST['tenis']))
			$aficciones .= ",1";
		if (isset($_POST['futbol']))
			$aficciones .= ",2";
		if (isset($_POST['baloncesto']))
			$aficciones .= ",3";
		if (isset($_POST['senderismo']))
			$aficciones .= ",4";
		if (isset($_POST['pesca']))
			$aficciones .= ",5";
		if (isset($_POST['natacion']))
			$aficciones .= ",6";		
		$_SESSION['datos'] .= $aficciones;
		print($_SESSION['datos']);
	}
?>

<body>
	<form action="" method="post">
		<table>
			<tr>
				<th>Nombre y apellidos</td>
				<th>Email</td>
				<th>URL</td>
				<th>Sexo</td>
				<th>Convivientes</td>
				<th>Favorito</td>
			</tr>
			<?php
				visualizarTabla_bd("tb_amigos");
				visualizarDatos($_SESSION['datos'],0)
			?>
		</table>
		<table>
			<th>Nombre de amigo</th>
			<th>Aficion</th>
			<?php
				visualizarTabla_bd("aficionesamigos");
				visualizarDatos($_SESSION['datos'],6)
			?>
		</table>
	</form>
</body>
</html>