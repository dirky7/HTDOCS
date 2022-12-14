<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Empleados</title>
    <style>
        fieldset {
            margin: 0 auto;
            width: 50%;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <?php
    require_once("empleados.php");
    session_start();

    if (!isset($_SESSION['empleados']) & isset($_POST['crear'])) {
        $nom = $_POST['nombre'];
        $ape = $_POST['apellidos'];
        $sue = $_POST['sueldo'];
        $empleado = new Empleado();
        $empleado->setNombre($nom);
        $empleado->setApellidos($ape);
        $empleado->setSueldo($sue);

        $_SESSION['empleados'] = $empleado;
    }

    if (isset($_POST['agregar'])) {
        $tel = $_POST['telefono'];
        $emp = $_SESSION['empleados'];
        $emp->anyadirTelefono($tel);
        $_SESSION['empleados'] = $emp;
    }
    ?>

    <form method="post" action="">
        <fieldset>
            <legend>Datos</legend>
            <label for="">Nombre: <input type="text" name="nombre"></label>
            <label for="">Apellidos: <input type="text" name="apellidos"></label>
            <label for="">Sueldo: <input type="number" name="sueldo"></label>
            <input type="submit" name="crear" value="Crear Objeto" <?php if (isset($_SESSION['empleados'])) echo 'disabled' ?>>
        </fieldset>
        <fieldset>
            <label for="">Telefono: <input type="tel" name="telefono"></label>
            <input type="submit" name="agregar" value="Agregar telefono">
        </fieldset>
        <fieldset>
            <legend>Operaciones</legend>

            <input type="submit" name="mostrar" value="Mostrar">
            <input type="submit" name="pagar" value="Pagar Impuestos">
            <input type="submit" name="vaciar" value="Vaciar telefonos">
            <input type="submit" name="borrar" value="Borrar Objeto">
        </fieldset>
    </form>
    <?php

    if (isset($_POST['mostrar'])) {
        $emp = $_SESSION['empleados'];
        $emp->listarTelefonos();
    }
    ?>

</body>

</html>