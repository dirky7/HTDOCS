<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>Título de la WEB</title>    
    <meta charset="UTF-8">
    <meta name="title" content="Título de la WEB">
    <meta name="description" content="Descripción de la WEB"> 
    <link rel="stylesheet" type="text/css" href="estilos.css">
     </head>  
  <body> 
    <?php
       include 'funciones.php';
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
    ?>
    <div class="bajoDch">
    <form name="formulario" action="ej4.php" method="post">
      
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" value=""></td>
                </tr>
                <tr>
                    <td>Teléfono:</td>
                    <td><input type="text" name="telefono" value=""></td>
                </tr>
                <tr>
                    <td colospan="2">
                      <input name="personas" type="hidden" value="<?php if (isset($array)) echo implode(",",$array);?>">
                      <input type="submit" name="ingresar" value="Ingresar dato">
                    </td>
                </tr>
            </table>
        
    </form>
</div>
  </body>  
</html>