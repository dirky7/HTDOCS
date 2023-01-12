<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="css/hoja.css">
</head>

<body>
<?php
  require_once("config/Persona.php");
  require_once("config/ClaseDB.php");
  session_start();
  if(!isset($_SESSION['datos'])){
    //Cargamos la base de datos en el array $data
    $sql="SELECT * FROM datos_usuarios";
    $registros=ClaseDB::matrizObjeto($sql);
    $data=array();
    foreach($registros as $datos){
      $id=$datos->id;
      $nom=$datos->nombre;
      $apel=$datos->apellidos;
      $dir=$datos->direccion;
      $persona=new Persona($id,$nom,$apel,$dir);
      $data[]=$persona;
    }
    $_SESSION['datos']=$data;
  } 
  $data=$_SESSION['datos'];
  if (isset($_POST['cr'])){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $apel=$_POST['ape'];
    $dir=$_POST['dir'];
    //comprobar que el id no existe
    if (!Persona::existeId($data,$id)){
      $persona=new Persona($id,$nom,$apel,$dir);
      $data[]=$persona;
      $_SESSION['datos']=$data;
    }
    
    header("location:index.php");
  }
  if (isset($_POST['acbd'])){
    $sql="delete from datos_usuarios";
    $bd=new ClaseDB();
    $bd->borrarUsuario($sql);
    if(!empty($data)){
      foreach ($data as $row){
        
      }
    }
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
      <td colspan="2" class='bot'>
        <input type='submit' name='cr' id='cr' value='Insertar'>
        <input type='submit' name='acbd' id='acbd' value='Actualizar BD'>
      </td>
    
    </tr>    
  </table>
  </form>

<p>&nbsp;</p>

</body>
</html>