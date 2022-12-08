<?php
	session_name("usuario");
	session_name("clave");
	session_name("hora");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gestión Personal</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
	<header>
		<h1>Gestión Personal</h1>
		<div id="nombre-usuario-cabecera">
			<i>Bienvenid@</i> <b><?php echo $_SESSION['usuario'] ?> | Sesión iniciada a las <?php echo $_SESSION['hora'] ?></b>
		</div>
	</header>
	<nav>Mi Cuenta</nav>
	<main>
		<div id="menu">
			<a href="movimientos.php?<?php  ?>">Últimos Movimientos</a>
			<a href="ingresar.php?<?php  ?>">Contabilizar un Ingreso</a>
			<a href="pagar.php?<?php  ?>">Contabilizar un Gasto</a>
			<a href="devolver.php?<?php  ?>">Eliminar un movimiento</a>
			<a href="../">Salir</a>
		</div>
	</main>
</body>
</html>