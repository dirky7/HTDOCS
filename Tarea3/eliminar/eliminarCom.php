<!DOCTYPE html>
<html lang="en">

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

        <h1>Indique el comercial que desea eliminar:</h1>
        <form action="" method="post" class="eliminar">
            <div class="centrar-horizont">
                <span>Comerciales:</span>
                <!--Creamos un despegable con todos los comerciales almacenados en la base de datos-->
                <select name="comerciales">
                    <?php
                    include "../funciones/funciones.php";
                    if (isset($_POST['comerciales'])){
                        $comerciales = $_POST['comerciales'];
                    }
                    // Rellenamos el desplegable con los datos de todos los productos
                    $conexion=conectar_bd("ventas_comerciales");
                    $sql="SELECT codigo,nombre FROM comerciales";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        $row = $resultado->fetch();
                        while ($row != null) {
                            echo "<option value='${row['codigo']}'";
                            // Si se recibió un código de producto lo seleccionamos
                            // en el desplegable usando selected='true'
                            if (isset($comerciales) && $comerciales == $row['codigo']){
                                echo " selected='true'";
                            }
                            echo ">${row['nombre']}</option>";
                            $row = $resultado->fetch();
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Eliminar Comercial" name="enviar" />
            </div>

            <?php
                echo '<div class="centrar-horizont2">';
                if(isset($_POST['enviar'])){
                    $sql="SELECT * FROM ventas INNER JOIN comerciales ON ventas.codComercial=comerciales.codigo WHERE ventas.codComercial='$comerciales'";
                    $tiene=tiene_ventas_asociadas("ventas_comerciales",$sql);
                    //Si el comercial tiene ventas asociadas se avisará al usuario y se dará la posibilidad de eliminar el comercial junto con sus ventas
                    if($tiene){
                        echo "El comercial seleccionado tiene ventas asociadas.Si elimina este comercial también se eliminarán dichas ventas sociadas.";
                        echo "¿Desea eliminar el comercial y sus ventas asociadas?";
                        echo '<input type="submit" value="Eliminar Comercial y Ventas" name="eliminar_asociadas" />';
                        echo '<input type="submit" value="Cancelar" name="cancelar" />';
                    }else{
                        echo "Se va a proceder a la eliminacion del comercial seleccionada.¿Está seguro?";
                        echo '<input type="submit" value="Eliminar Comercial" name="eliminar" />';
                        echo '<input type="submit" value="Cancelar" name="cancelar" />';
                    }
                }
                echo '</div>';

                echo '<div class="centrar-horizont2">';
                if(isset($_POST['eliminar_asociadas'])){
                    $sql="DELETE FROM ventas WHERE codComercial='$comerciales'";
                    realizar_operacion("ventas_comerciales",$sql);
                    $sql="DELETE FROM comerciales WHERE codigo='$comerciales'";
                    $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo '<p class="correcto">Operacion realizada con exito</p>';
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;eliminarCom.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
                }
                echo '</div>';

                echo '<div class="centrar-horizont2">';
                if(isset($_POST['eliminar'])){
                    $sql="DELETE FROM comerciales WHERE codigo='$comerciales'";
                    $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo '<p class="correcto">Operacion realizada con exito</p>';
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;eliminarCom.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
                }
                echo '</div>';
                unset($conexion);

            ?>
        </form>
    </div>

</body>

</html>