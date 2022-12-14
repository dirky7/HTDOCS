<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title>Document</title>
</head>
<body>
<?php
       include 'funciones.php';
	   header('Content-Type: text/html; charset=utf-8');
	   /*Definir mi array y llevar el control de la cantidad de elementos del array
	   * Se envia los datos separados por ',' con implode y se convierte a lista con explode
	   */
	   if(!empty($_POST['personas'])){
        $array=explode(",",$_POST['personas']);
        $pos=count($array);
       }else{
        $array=array();
        $pos=0;
       }
	   
	   //Si he pulsado ingresar
	   if(isset($_POST["ingresar"])){
		$nom=$_POST["nombre"];
		$tel=$_POST["telefono"];
		if(validarInsertar($array,$nom,$tel)){
		   $array=agregar($array,$nom,$tel,$pos);
		}
		mostrarTabla($array);
	   }
	   
	   //Si he pulsado borrar
	   if(isset($_POST["borrar"])){
		   $nom=$_POST["nombre"];
		   $array=borrar($array,$nom);
		   mostrarTabla($array);
	   }
	   
	   //Si he pulsado modificar
	   if(isset($_POST["modificar"])){
		   $nom=$_POST["nombre"];
		   $tel=$_POST["telefono"];
		   $array=modificar($array,$nom,$tel);
		   mostrarTabla($array);
	   }
	   
	   //Si he pulsado ver
	    if(isset($_POST["ver"])){
		   mostrarTabla2($array);
	   }
    ?>
    <div class="bajoDch">
		<form name="formulario" action="ej4e.php" method="post">
			<table>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="nombre" value="" size="35"></td>
				</tr>
				<tr>
					<td>Teléfono:</td>
					<td><input type="text" name="telefono" value="" size="35"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input name="personas" type="hidden" value="<?php if (isset($array)) echo implode(",",$array);?>">
						<input type="submit" name="ingresar" value="Ingresar dato">
						<input type="submit" name="borrar" value="Borrar dato">
						<input type="submit" name="modificar" value="Modificar dato">
						<input type="submit" name="ver" value="Ver dato">
					</td>
				</tr>
			</table>
    	</form>
	</div>
</body>
</html>