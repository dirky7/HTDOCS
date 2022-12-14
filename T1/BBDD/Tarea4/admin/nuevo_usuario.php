<?php
	include "../inc/header.inc.php";
	$mensaje_error = "";
	if (isset($_POST['form_new_user']))
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$nombre = $_POST['nombre'];
		$fNacimiento = $_POST['fNacimiento'];
		$presupuesto = $_POST['presupuesto'];
		$nuevo_usuario = array(
			'login' => $login,
			'password' => $password,
			'repassword' => $repassword,
			'nombre' => $nombre,
			'fNacimiento' => $fNacimiento,
			'presupuesto' => $presupuesto
		);
		$errores = errorValidarDatosUsuario($nuevo_usuario);
		if ($errores == false)
		{
			insert_user($nuevo_usuario);
			$nueva_transaccion = array(
				'login' => $login,
				'fecha' => date('Y-m-d'),
				'concepto' => "Cuenta abierta",
				'cantidad' => $presupuesto
			);
			insert_transac($nueva_transaccion, "+");
		}
		else
		{
			$mensaje_error = "<div class='error'>" . $errores . "</div>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Creación de Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body id="pagina-login">
	<header><h1>Creación de Usuarios</h1></header>
	<nav>
		<span class="desplegable">
			<a href="index.php">Administrar Usuarios</a>
			<div>
				<a href="nuevo_usuario.php">Nuevo Usuario</a>
				<a href="modificar_usuario.php">Modificar Usuario</a>
				<a href="borrar_usuario.php">Borrar Usuario</a>
				<a href="../">Salir</a>
			</div>
		</span>
		&gt; Nuevo Usuario
	</nav>
	<main>
		<fieldset class="mini-formulario"><legend>Datos Nuevo Usuario</legend>
			<?php
			if (!empty($error)) {echo "<div class='error'><b>!</b>$error</div>";}
			if (!empty($correcto)) {echo "<div class='correcto'><b>!</b>$correcto</div>";}
			?>
			<form method="post" action="">
				<?php
					echo $mensaje_error;
				?>
				<div class="input-labeled">
					<label>Login:</label>
					<input type="text" name="login" required maxlength="10">
				</div>
				<div class="input-labeled">
					<label>Clave:</label>
					<input type="password" name="password" required maxlength="20">
				</div>
				<div class="input-labeled">
					<label>Repite Clave:</label>
					<input type="password" name="repassword" required maxlength="20">
				</div>
				<div class="input-labeled">
					<label>Nombre:</label>
					<input type="text" name="nombre" required maxlength="30">
				</div>
				<div class="input-labeled">
					<label>Fecha Nacimiento:</label>
					<input type="date" name="fNacimiento" placeholder="aaaa-mm-dd" required maxlength="10">
				</div>
				<div class="input-labeled">
					<label>Presupuesto:</label>
					<input type="text" name="presupuesto" required maxlength="30">
				</div>
				<input type="submit" name="form_new_user" value="Crear Usuario">
			</form>
		</fieldset>
	</main>
</body>
</html>