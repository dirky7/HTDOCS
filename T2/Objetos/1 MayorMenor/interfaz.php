<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz MayorMenor</title>
</head>
<body>
    <?php
        if (!isset ($_COOKIE['milista'])) {
            $lista = array();
            /*La función serialize() convierte una representación almacenable de un valor.
            Serializar datos significa convertir un valor en una secuencia de bits, de modo que pueda almacenarse en un archivo, un búfer de memoria o transmitirse a través de una red. */
            setcookie('milista', serialize($lista), time() +3600);
        }
        else {
            //si hemos hecho clic en agregar
            if (isset ($_POST['agregar'])) {
                $lista = unserialize($_COOKIE['milista']);
                if (!empty ($_POST['numero'])) {
                    $lista[] = $_POST['numero'];
                    setcookie('milista', serialize($lista), time() +3600);
                }
            }
            //si hacemos clic en mostrar
            if (isset ($_POST['mostrar'])) {
                require_once ("MayorMenor.php");
                $resultado = new MayorMenor();
                $lista = unserialize($_COOKIE['milista']);
                if (count ($lista) > 0) {
                    $objeto = $resultado -> maymen ($lista);
                }
                echo "<br>Mayor: " .$objeto -> getMayor();
                echo "<br>Menor: " .$objeto -> getMenor();
            }
            //si hacemos clic en borrar
            if (isset ($_POST['borrar'])) {
                $lista = array();
                setcookie('milista', serialize($lista), time() -3600);
            }
        }
    ?>
    <form method="post" action="">
        <label for="">Introduce un numero: </label>
        <input type="number" name="numero">
        <input type="submit" name="agregar" value="agregar">
        <input type="submit" name="mostrar" value="mostrar">
        <input type="submit" name="borrar" value="borrar">

    </form>

</body>
</html>