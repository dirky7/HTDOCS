<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
		table {
			text-align: center;
		}
		table tr:first-of-type>td
		{
			background-color: yellow;
			text-decoration: underline;
			font-weight: bold;
			font-size: 25px;
		}
		td
		{
			border: 1px dotted black;
			padding: 3px 10px 3px 10px;
			background-color: rgb(255, 234, 163);
		}
	</style>
    <title>Ejercicio 1 - DHP</title>
</head>
<body>
    <?php
        include "funciones_examen.php";

		print("
		
		<table>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Direccion</td>
		</tr>
		
		");

        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
        }else{
            $nombre = "";
        }

        if(isset($_POST['apellido'])){
            $p = $_POST['apellido'];
        }else{
            $p = "";
        }

        if(isset($_POST['direccion'])){
            $d = $_POST['direccion'];
        }else{
            $d = "";
        }

        if(!empty($_POST['copia'])){
            $lista = explode(",",$_POST['copia']);
        }else{
            $lista = array();
        }

        if(isset($_POST['enviar'])){
            $lista = insertar_datos($_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$lista);
        }

        mostrar_tabla($lista);

        $nombre = $p = $d = "";
    ?>

    <form action="" method="post">
		<tr>
			<td></td>
			<td>
				<input type="text" name="nombre" value="<?php echo $nombre ?>">
			</td>
			<td>
				<input type="text" name="apellido" value="<?php echo $p ?>">
			</td>
			<td>
				<input type="text" name="direccion" value="<?php echo $d ?>">
			</td>
			<td>
				<input type="submit" name="enviar">
		
				<input name="copia" type="hidden" value="<?php if (isset($lista)) echo implode(",",$lista);?>">
			</td>
		</tr>
    </form>
	<?php
		print("</table>");
	?>
</body>

</html>