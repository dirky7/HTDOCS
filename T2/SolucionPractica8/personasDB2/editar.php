<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>
<?php
  require_once("Persona.php");
  session_start();
  if(!isset($_SESSION['datos'])){
      header("location:index.php");
  }
  $ide=$_GET['edit_id'];
  $data=$_SESSION['datos'];

  $persona=$data[$ide];
  if(isset($_POST['bot_actualizar'])){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $apel=$_POST['ape'];
    $dir=$_POST['dir'];
    $persona->setId($id);
    $persona->setNombre($nom);
    $persona->setApellidos($apel);
    $persona->setDireccion($dir);
   
    $data[$ide]=$persona;
    $_SESSION['datos']=$data;
    header("Location:index.php");
  }
?>
<h1>ACTUALIZAR</h1>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <table width="25%" border="0" align="center">
    <tr>
      <td>Id</td>
      <td><label for="id"></label>
      <input type="text" name="id" id="id" value="<?php echo $persona->getId(); ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $persona->getNombre(); ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $persona->getApellidos(); ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $persona->getDireccion(); ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>