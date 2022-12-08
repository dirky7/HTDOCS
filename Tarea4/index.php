<?php
	include "./inc/header.inc.php";
	if (isset($_POST['form_login']))
	{
		if (user_exists($_POST['usuario']))
		{
			if (verify_password($_POST['usuario'], $_POST['clave']))
			{
				session_name("usuario");
				session_name("clave");
				session_name("hora");
				session_start();
				$_SESSION['usuario'] = $_POST['usuario'];
				$_SESSION['clave'] = $_PSOT['clave'];
				$_SESSION['hora'] = date("H:i", time());
				header("Location:./cuenta/");
			}
			else
			{
				$error = "Contraseña no coincidente";
			}
		}
		else
		{
			$error = "Usuario no existente";
		}
	}
	if (isset($_POST['form_admin_login']))
	{
		if ($_POST['usuario'] == "daw")
		{
			if (verify_password("daw", $_POST['clave']))
			{
				session_name("usuario");
				session_name("clave");
				session_name("hora");
				session_start();
				$_SESSION['usuario'] = $_POST['usuario'];
				$_SESSION['clave'] = $_PSOT['clave'];
				$_SESSION['hora'] = date("H:i", time());
				header("Location:./admin/");
			}
			else
			{
				$error = "Contraseña no coincidente";
			}
		}
		else
		{
			$error = "Permiso denegado por administrador";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contabilidad Personal</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body id="pagina-login">
	<header><h1>Gastos Personales</h1></header>
	<nav>Contabilidad personal</nav>
	<main>
		<fieldset class="mini-formulario"><legend>Iniciar Sesión</legend>
			<?php
			if (isset($error)) {
				echo "<div class='error'>$error</div>";
			}
			?>
			<form method="post">
				<div class="input-labeled">
					<label>Usuario:</label>
					<input type="text" name="usuario" required maxlength="10">
				</div>
					
				
				<div class="input-labeled">
					<label>Clave:</label>
					<input type="password" name="clave" required maxlength="20">
				</div>
				<input type="submit" name="form_login" value="Gestionar mi cuenta">
				<hr>
				<input type="submit" name="form_admin_login" value="Gestionar Usuarios">
			</form>
		</fieldset>
	</main>
</body>
</html>
