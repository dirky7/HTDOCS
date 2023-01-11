<?php
    require_once("Persona.php");
    session_start();
    if(!isset($_SESSION['datos'])){
        header("location:index.php");
    }
    $data=$_SESSION['datos'];
    $id=$_GET['delete_id'];
    unset($data[$id]);
    //$data=array_values($data);
    $_SESSION['datos']=$data;
    header("location:index.php");
    
?>