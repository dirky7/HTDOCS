<?php
	$action = $_POST['action'];
	if ($action == "Destruir")
	{
		setcookie("action", "", -1);
	}
	else
	{
		if ($action == "Crear")
		{
			setcookie("action", $action, time()+$_POST['segs']);
		}
		else
		{
			setcookie("action", $action);
		}
	}
	header("Location:cookies3a.php");
?>