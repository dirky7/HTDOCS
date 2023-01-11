<?php
    include "claseDB.php";
    $id=$_GET['id'];
    $query="delete from dwes_alumnos where id='$id'";
    $db = new ClaseDB();
	$db->borrarUsuario($query);
    header("Location:index.php");
?>