<?php
    include 'funciones.inc';
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: index.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Empresa Okupa</title>
  <link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
    <form action='index.php' method='post'>
    <fieldset>
        <legend>Login</legend>
        <div><span class='error'><?php if (isset($error)) echo $error; ?></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
        <div class='enlace'>
            <a href='registro.php'>Registrarse</a>
        </div>    
        <div class='enlace'>
            <a href='invitado.php'>Entrar como invitado</a>
        </div>

    </fieldset>
    </form>
    </div>
</body>
</html>
