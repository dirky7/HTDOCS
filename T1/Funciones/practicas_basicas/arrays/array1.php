<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./bootstrap.min.css">
	<title>Ejercicio 1 - DHP</title>
</head>
<?php
	function formulario()
	{
?>
		<div>
			<table>
				<tr>
					<td>Introduce el numero de bola</td>
					<td>
						<input type="text" name="numbola">
					</td>
					<td>
						<input type="submit" name="sacar" value="Sacar bola">
					</td>
				</tr>
			</table>
		</div>
<?php
	}
	function mostrarBola($lista)
	{
		if (!empty($lista))
		{			
			print("
				<table>
					<tr>
						<td>Listado de bolas actual: </td>	
			");
			foreach ($lista as $num) {
				print("<td>&nbsp; $num &nbsp;</td>");
			}
			print("
				
					</tr>
				</table>
			");
		}
	}
	$bolas = array();
	if (isset($_REQUEST['bolas']))
	{
		$bolas = $_REQUEST['bolas'];
	}
	if (isset($_REQUEST['sacar']))
	{
		$resultado = $_REQUEST['numbola'];
		if (is_numeric($resultado))
		{
			if (!in_array($resultado, $bolas))
			{
				$bolas[] = $resultado;
			}
		}
	}
?>
<body>
	<form name="formulario" action="./array1.php" method="post">
		<?php
			mostrarBola($bolas);
			
			formulario();
			
			foreach($bolas as $clave => $numero)
			{
				echo '<input type="hidden" name="bolas[' . $clave . ']" value="' . $numero . '">';
			}
		?>
	</form>
</body>
</html>