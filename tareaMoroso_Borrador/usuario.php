<?php
    include 'funciones.inc';
    
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: anunciante.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Usuarios</title>
  <link href="css/voluntario.css" rel="stylesheet" type="text/css">
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
		<?php
			//Si es el usuario dwes aparecerá en el menú Desbloquear
		?>
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php ?></p></div>
       <div class="sesion"><p>Bienvenido <?php  ?></p></div>        
  </div>
  <div id="anuncios">
      <?php
       
		//include('escaparate.php');
      ?>
  </div>
  <div id="footer">
  </div>  
</div>
</body>
</html>
