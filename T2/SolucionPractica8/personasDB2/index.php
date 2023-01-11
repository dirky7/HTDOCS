<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>
<?php
  require_once("Persona.php");
  session_start();
  if(!isset($_SESSION['datos'])){
    $_SESSION['datos']=array();
  }
  $data=$_SESSION['datos'];
  if (isset($_POST['cr'])){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $apel=$_POST['ape'];
    $dir=$_POST['dir'];
    $persona=new Persona($id,$nom,$apel,$dir);
    $data[]=$persona;
    $_SESSION['datos']=$data;
    header("location:index.php");
  }
?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   <?php
    $index=0;
    if(!empty($data)){
      foreach ($data as $row){
   ?>
		
   	<tr>
      <td><?php echo $row->getId();?></td>
      <td><?php echo $row->getNombre();?></td>
      <td><?php echo $row->getApellidos();?></td>
      <td><?php echo $row->getDireccion();?></td>
      <td class="bot"><a href="borrar.php?delete_id=<?php echo $index;?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?edit_id=<?php echo $index;?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>
  <?php
      $index++;
      }
    }
  ?>
	<tr>
	<td><input type='text' name='id' size='10' class='centrado'></td>
      <td><input type='text' name='nom' size='10' class='centrado'></td>
      <td><input type='text' name='ape' size='10' class='centrado'></td>
      <td><input type='text' name=' dir' size='10' class='centrado'></td>
      <td colspan="2" class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    
    </tr>    
  </table>
  </form>

<p>&nbsp;</p>

</body>
</html>