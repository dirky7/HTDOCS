<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div id="encabezado">
		<h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>
		<form id="form_seleccion" action="./ejercicio4.php" method="post">
			<span>Producto: </span>
			<select name="producto">
				<?php
				if (isset($_POST['producto'])) $producto = $_POST['producto'];
				// Rellenamos el desplegable con los datos de todos los productos
				@$dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
				$error = $dwes->connect_errno;
				if ($error == null) {
					$sql = "SELECT cod, nombre_corto FROM producto";
					$resultado = $dwes->query($sql);
					if ($resultado) {
						$row = $resultado->fetch_assoc();
						while ($row != null) {
							echo "<option value='${row['cod']}'";
							// Si se recibió un código de producto lo seleccionamos
							// en el desplegable usando selected='true'
							if (isset($producto) && $producto == $row['cod'])
								echo " selected='true'";
							echo ">${row['nombre_corto']}</option>";
							$row = $resultado->fetch_assoc();
						}
						$resultado->close();
					}
				} else {
					$mensaje = $dwes->connect_error;
				}
				?>
			</select>
			<input type="submit" value="Mostrar stock" name="enviar" />
		</form>
	</div>
	<div id="contenido">
		<h2>Stock del producto en las tiendas:</h2>
		<?php
		// Si se recibió un código de producto y no se produjo ningún error
		// mostramos el stock de ese producto en las distintas tiendas
		if ($error == null && isset($producto)) {
			$sql = <<<SQL
				SELECT tienda.nombre, stock.unidades
				FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda
				WHERE stock.producto='$producto'
				SQL;
			$resultado = $dwes->query($sql);
			if ($resultado) {
				$row = $resultado->fetch_assoc();
				while ($row != null) {
					echo "<p>Tienda ${row['nombre']}: ${row['unidades']} unidades.</p>";
					$row = $resultado->fetch_assoc();
				}
				$resultado->close();
			}
		}
		?>
	</div>
	<div id="pie">
		<?php
		// Si se produjo algún error se muestra en el pie
		if ($error != null) echo "<p>Se ha producido un error! $mensaje</p>";
		else {
			$dwes->close();
			unset($dwes);
		}
		?>
	</div>
</body>

</html>