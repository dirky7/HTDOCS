<?php
    include 'funciones.inc';
    
	$datos_correctos = false;
	if (isset($_POST['enviar']))
	{
		$login = $_POST['usuario'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];

		$error = "";
		
		//--- Validación de campos ---
		if (empty($login) || empty($password) || empty($password2) || empty($email))
		{
			$error = $error . "Debe de completar todos los campos<br>";
		}
		else
		{
			$conexion = conexion_bd();
			if (existe_login($login, $conexion))
			{
				$error .= "El login elegido ya existe  en la base de datos<br>";
			}
			//Comprobar que las password coinciden
			if (!strcmp($password, $password2) == 0)
			{
				$error .= "Las contraseñas deben ser iguales.<br>";
			}
			//Comprueba que la contraseña debe de tener 6 o mas caracteres
			if (!comprueba_tamanio_contrasenia($password))
			{
				$error .= "La contraseña debe de tener un minimo de 6 caracteres<br>";
			}
			//Comprueba que la contraseña debe de tener una minuscula
			if (!comprueba_minus_contrasenia($password))
			{
				$error .= "La contraseña debe de tener una minuscula<br>";
			}
			//Comprueba que la contraseña debe de tener una mayuscula
			if (!comprueba_mayus_contrasenia($password))
			{
				$error .= "La contraseña debe de tener una mayuscula<br>";
			}
			//Comprobar que tiene numeros en la contraseña
			if (!comprueba_num_contrasenia($password))
			{
				$error .= "La contraseña debe de tener numeros<br>";
			}
			//Comprobar que la direccion de email es la correcta
			if (!validar_email($email))
			{

			}
			if (strcmp($error, "") == 0)
			{
				if (inserta_usuario($login, $password, $email, $conexion))
				{
					$anuncio = "Usuario registrtado correctamente";
				}
				else
				{
					$error .= "Ha ocurrido un error en el registro";
				}
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: registro.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Foro DWES</title>
  <link href="css/registro.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='registro'>
    <form action='registro.php' method='post'>
    <fieldset>
        <legend>Registro de nuevo usuario</legend>
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
            <label for='usuario' >Login:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Repita la Contraseña:</label><br/>
            <input type='password' name='password2' id='password2' maxlength="50" /><br/>
        </div>
         <div class='campo'>
            <label for='email' >Email:</label><br/>
            <input type='text' name='email' id='email' maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><br/>
        </div>
        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
        <div class='campo'>
            <input type='button' name='volver' value='Volver' onClick="location.href='index.php'"/>
        </div>  
        
    </form> 
    </fieldset>
    </div>
</body>
</html>


