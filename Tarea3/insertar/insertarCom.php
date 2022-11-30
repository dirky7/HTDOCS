<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <title>Tarea3</title>
</head>

<body>
    <div class="contenido">

        <ul>
            <li><a href="../principal.php">Inicio</a></li>
            <li><a href="../consultar.php">Consulta de datos</a></li>
            <li><a href="../insertar.php">Inserción de datos</a></li>
            <li><a href="../modificar.php">Modificación de datos</a></li>
            <li><a href="../eliminar.php">Eliminación de datos</a></li>
        </ul>

        <h1>Introduzca los datos del nuevo comercial:</h1>
        <div class="centrar-horizont2">
            <form action="" method="post">
                <label>codigo</label>
                <input type="text" name="codigo" required><br><br>
                <label>nombre</label>
                <input type="text" name="nombre" required><br><br>
                <label>salario</label>
                <input type="number" name="salario" step="any" required><br><br>
                <label>hijos</label>
                <input type="number" name="hijos" step="any" required><br><br>
                <label>fecha Nacimiento</label>
                <input type="date" name="fnac" required><br><br>
                <input type="submit" name="enviar" value="Insertar Comercial">
            </form>
        </div>

        <?php
            include "../funciones/funciones.php";
            echo '<div class="centrar-horizont2">';
            if(isset($_POST['enviar'])){
                $codigo=$_POST['codigo'];
                $nombre=$_POST['nombre'];
                $salario=$_POST['salario'];
                $hijos=$_POST['hijos'];
                $fechNac=$_POST['fnac'];
                $sql="INSERT INTO `comerciales` (`codigo`, `nombre`, `salario`, `hijos`, `fNacimiento`) VALUES ('$codigo', '$nombre',$salario,$hijos, '$fechNac');";
                $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo "<p class='correcto'>Operacion realizada con exito</p>";
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;insertarCom.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
            }
            echo '</div>';
        ?>
    </div>
</body>

</html>