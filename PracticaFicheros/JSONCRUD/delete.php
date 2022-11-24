<?php

	$delete_id = $_GET['delete_id'];
	$data = file_get_contents("miembros.json");
	$data = json_decode($data, true);
	unset($data[$delete_id]);

	$data = array_values($data);

	$data = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents("miembros.json", $data);
	header("Location:index.php");

?> 