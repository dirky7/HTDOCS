<?php
	session_name("azul");
	session_name("naranja");
	session_start();

	$azul = $_SESSION['azul'];
	$naranja = $_SESSION['naranja'];

	if (isset($_GET['azul']))
		{
			$_SESSION['azul'] = $azul + 1;
			print($_SESSION['azul']);
		}
		if (isset($_GET['naranja']))
		{
			$_SESSION['naranja'] = $naranja + 1;
			print($_SESSION['naranja']);
		}
		if (isset($_GET['reboot']))
		{
			$_SESSION['naranja'] = 0;
			$_SESSION['azul'] = 0;
		}
	header("Location:index.php");
?>