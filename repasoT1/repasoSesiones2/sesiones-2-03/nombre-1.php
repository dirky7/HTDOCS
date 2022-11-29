<?php
/**
 * Sesiones (2) 03 - nombre-1.php
 *
 * @author Escriba aquí su nombre
 *
 */

print "<!-- Ejercicio incompleto -->\n";

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Nombre (1).
    Sesiones (2). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
  <h1>Nombre (1)</h1>

<?php
if (isset($_SESSION["nombre"])) {
    print "  <p>Usted ya ha escrito que su nombre es: <strong>$_SESSION[nombre]</strong></p>\n";
}
?>

  <form action="nombre-2.php" method="get">
    <p>Escriba su nombre:</p>

<?php

print "<!-- Ejercicio incompleto -->\n";
print "\n";

print "    <p><label>Nombre: <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"></label></p>\n";
print "\n";

?>
    <p>
      <input type="submit" value="Guardar">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <p><a href="index.php">Volver al inicio.</a></p>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>
</html>
