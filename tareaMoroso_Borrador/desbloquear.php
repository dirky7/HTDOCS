<?php
    include 'funciones.inc';
    //Recuperar la sesion
	session_start()

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
  <style>
		body{
			background-color: <?php if (isset($_COOKIE['color_fondo'])) echo $_COOKIE['color_fondo']?>;
		}
  </style>
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
			//Si es el usuario dwes aparece desbloquear en el menú
			$autor = $_SESSION['usuario'];
			if ($autor == 'dwes')
			{
				echo "<li><a href='desbloquear.php'>Desbloquear</a></li>";
			}
		?>
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php ?></p></div>
       <div class="sesion"><p>Bienvenido <?php ?></p></div>        
  </div>
  <div id="anuncios">
      <?php
	  	//desbloquear usuarios
		$con = conexion_bd('morosos');
		//Ejecutamos la accion de desbloquear
		if (!empty($_POST['desbloquear']))
		{
			if (desbloquearUsuarios($_POST['desbloquear'], $con))
			{
				$correcto = "Usuario desbloqueado";
			}
		}
		//Obtener lista de desbloqueados
      ?>
	  
  </div>
  <div>
    <br><br>
	<table class="tabla">
			<thead>
				<tr>
					<th>login</th>
					<th>email</th>
					<th>bloqueado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					//usuarios bloqueados
					$bloqueados = 0;
					foreach($db as $indice=>$anun)
				?>
			</tbody>
			<tfoot>
				<tr>
					<th><?php  ?></th>
					<th colspan="3"></th>
				</tr>
			</tfoot>
		</table>
  </div>
  <div id="footer">
  </div>  
</div>
</body>
</html>
