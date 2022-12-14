<?php
   include 'config/misfunciones.php';
   //definir variables y los campos vacios
   $emailErr=$emailNuevoErr="";
   //Asignar valores a las variables
     if(isset($_REQUEST['mail'])){
    $mail=$_REQUEST['mail'];
 }else{
   $mail="";
 }

 if(isset($_REQUEST['mailNuevo'])){
  $mailNuevo=$_REQUEST['mailNuevo'];
}else{
 $mailNuevo="";
}

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    //validamos email
    if (empty($_POST["mail"])){
      $emailErr="Introduce el email";
    }else{
      if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $emailErr="Formato incorrecto";
      }
    }

    if (empty($_POST["mailNuevo"])){
      $emailNuevoErr="Introduce el email";
    }else{
      if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $emailNuevoErr="Formato incorrecto";
      }
    }
 }
  
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
  <title>Cursos</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css" >
</head>

<body>
  
  <fieldset class="scrollmenu">
      <a href="principal.php">Inicio</a>
	  <a href="insertar.php">Insertar</a>
	  <a href="listar.php">Listar</a>
	  <a href="borrar.php">Borrar</a>	
	  <a href="modificar.php">Modificar</a>
    </fieldset>  
	
	<p><span class="error">* required field</span></p>
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  
  Ingrese el E-mail del alumno: <input type="text" name="mail" placeholder="Introduce Email" value="">
  <span class="error">*<?php echo $emailErr; ?> </span>
  <br><br>
  Ingrese el Nuevo E-mail del alumno: <input type="text" name="mailNuevo" placeholder="Introduce Email" value="">
  <span class="error">*<?php echo $emailNuevoErr; ?> </span>
  <br><br>
  <input type="submit" name="submit" value="Modificar">  
  <input type="reset" value="Limpiar">
</form>
<?php
  if(($_SERVER["REQUEST_METHOD"]=="POST")&&($emailErr=="")&&($emailNuevoErr=="")){
    $mail=$_REQUEST["mail"];
    $mailNuevo=$_REQUEST['mailNuevo'];
    $query="update alumnos set mail='$mailNuevo' where mail='$mail'";
    $bd="alumnos";
    modificar($query,$mail,$bd);
  }
 ?>
 
</body>

</html>