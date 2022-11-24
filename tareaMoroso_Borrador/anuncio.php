<?php
    include 'funciones.inc';
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: anuncio.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Foro DWES</title>
  <link href="css/voluntario.css" rel="stylesheet" type="text/css">
  <link href="css/anuncio.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="contenedor">
  <div id="logotipo">
    <p><a href="usuario.php">Empresa Okupa</a></p>
  </div>
  <div id="menu">
    <ul>
        <li><a href="anuncio.php">Publicar anuncio</a></li>
        <li><a href="usuario.php">Listado de anuncios</a></li>
        <li><a href="preferencias.php">Preferencias</a></li>
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php  ?></p></div>
       <div class="sesion"><p>Bienvenido <?php  ?></p></div>        
  </div>
  <div id="publicar_anuncio">
  <form action='anuncio.php' method='post'>
    <fieldset>
        <legend>Publicar anuncio</legend>
        <div>
            <?php 
            if(isset($error)) {
                echo "<span class='error'>" . $error . "</span>";
            }
            if (isset($anuncio)) {
                echo "<span class='anuncio'>" . $anuncio . "</span>";
            }
            ?>
        </div>
        <div class='campo'>
            <label for='anuncio' >Introduzca un anuncio:</label><br/>
            <textarea cols='50' rows='10' name='textarea'><?php if (isset($_POST['textarea'])) echo $_POST['textarea']; ?></textarea>
			<br>
			<label for='moroso' >Moroso:</label><input type='text' name='moroso'/><br/><br/>
			<label for='localidad' >Localidad:</label><input type='text' name='localidad'/><br/>
        </div>
        
        <br/>
        <div class='campo'>
            <input type='submit' name='publicar' value='Publicar' />
        </div> 
        
    </form> 
  <div id="footer">
  </div>  
</div>
</body>
</html>


