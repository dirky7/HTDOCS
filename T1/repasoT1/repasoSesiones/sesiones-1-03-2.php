<?php
	/**
	 * Sesiones (1) 03 - sesiones-1-03-2.php
	 *
	 * @author Escriba aquí su nombre
	 *
	*/
	session_name("sesion3");
	session_start();
	// Funciones auxiliares 1
	function recoge($var, $m = "")
	{
		$tmp = is_array($m) ? [] : "";
		if (isset($_REQUEST[$var])) {
			if (!is_array($_REQUEST[$var]) && !is_array($m)) {
				$tmp = trim(htmlspecialchars($_REQUEST[$var]));
			} elseif (is_array($_REQUEST[$var]) && is_array($m)) {
				$tmp = $_REQUEST[$var];
				array_walk_recursive($tmp, function (&$valor) {
					$valor = trim(htmlspecialchars($valor));
				});
			}
		}
		return $tmp;
	}

	// Recogemos la palabra
	$texto = $_GET['texto'];
	if (!empty($texto))
	{
		$_SESSION['texto'] = $texto;
		if (!ctype_upper($texto))
		{
			$_SESSION['error'] = "Has introducido una minuscula";	
		}
		
	}
	else
	{
		$_SESSION['error'] = "No ha introducido nada";
	}

	// Guardamos la palabra en la sesión 


	// Comprobamos la palabra

		// Si no se recibe palabra, guardamos en la sesión el mensaje de error 

		// Si la palabra está en minúsculas, guardamos en la sesión el mensaje de error 

		// Si la palabra es correcta, borramos el error anterior que pudiera haber en la sesión 


	// Volvemos al formulario 
	header("Location:sesiones-1-03-1.php");
?>