<?php
    include "funciones.php";
    $base="alumnos";
    $id=$_GET['id'];
    $query="delete from dwes_alumnos where id='$id'";
    borrarUsuario($query,$base);
    header("Location:index.php");
?>