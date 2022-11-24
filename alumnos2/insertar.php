<?php
   include 'config/misfunciones.php';
   //definir variables y los campos vacios
   $nameErr=$emailErr="";
   //Asignar valores a las variables
   if(isset($_REQUEST['nombre'])){
      $name=$_REQUEST['nombre'];
   }else{
     $name="";
   }
   if(isset($_REQUEST['mail'])){
    $mail=$_REQUEST['mail'];
 }else{
   $mail="";
 }
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["nombre"])){
      $nameErr="Introduce el nombre";
    }else{
      $name=test_input($_POST["nombre"]);
      //introducir solo texto o espacios en blanco
      if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $nameErr="Solo letras y espacios en blanco";
      }   
    }
    //validamos email
    if (empty($_POST["mail"])){
      $emailErr="Introduce el email";
    }else{
      if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $emailErr="Formato incorrecto";
      }
    }
  }
  //Escribir las variables de error en su sitio
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
  Nombre: <input type="text" name="nombre" placeholder="Introduce nombre" value="<?php echo $name;?>" autofocus>
  <span class="error">*<?php echo $nameErr;  ?> </span>
  <br><br>
   E-mail: <input type="text" name="mail" placeholder="Introduce Email" value="<?php echo $mail;?>">
  <span class="error">* <?php echo $emailErr;?> </span>
  <br><br>
  Seleccione el curso:
    <select name="codigocurso">
      <option value="1">PHP</option>
      <option value="2">ASP</option>
      <option value="3">JSP</option>
    </select>
	<br><br>
	<input type="submit" name="submit" value="Enviar">  
  <input type="reset" value="Restaurar">
</form>
<?php
  if(($_SERVER["REQUEST_METHOD"]=="POST")&&($emailErr=="")&&($nameErr=="")){
    $name=$_REQUEST["nombre"];
    $mail=$_REQUEST["mail"];
    $curso=$_REQUEST["codigocurso"];
    $query="insert into alumnos(nombre,mail,codigocurso)values('$name','$mail',$curso)";
    $bd="alumnos";
    insertar($query,$bd);
    echo "El alumno fue dado de alta";
  }
 ?>
 
</body>

</html>