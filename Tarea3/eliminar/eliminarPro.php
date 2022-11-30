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

        <h1>Indique el producto que desea eliminar:</h1>
        <form action="" method="post" class="eliminar">
            <div class="centrar-horizont">
                <span>productos:</span>
                <!--Creamos un despegable con todos los productos almacenados en la base de datos-->
                <select name="productos">
                    <?php
                    include "../funciones/funciones.php";

                    if (isset($_POST['productos'])){
                        $productos = $_POST['productos'];
                    }
                    // Rellenamos el desplegable con los datos de todos los productos
                    $conexion=conectar_bd("ventas_comerciales");
                    $sql="SELECT referencia,nombre,descripcion FROM productos";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        $row = $resultado->fetch();
                        while ($row != null) {
                            echo "<option value='${row['referencia']}'";
                            // Si se recibió un código de producto lo seleccionamos
                            // en el desplegable usando selected='true'
                            if (isset($productos) && $productos == $row['referencia']){
                                echo " selected='true'";
                            }
                            echo ">${row['nombre']}--${row['descripcion']}</option>";
                            $row = $resultado->fetch();
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Eliminar Producto" name="enviar" />
            </div>

            <?php
                echo '<div class="centrar-horizont2">';
                if(isset($_POST['enviar'])){
                    $sql="SELECT * FROM ventas INNER JOIN productos ON ventas.refProducto=productos.referencia WHERE ventas.refProducto='$productos'";
                    $tiene=tiene_ventas_asociadas("ventas_comerciales",$sql);
                    //Si el producto tiene ventas asociadas se avisará al usuario y se dará la posibilidad de eliminar el producto junto con sus ventas
                    if($tiene){
                        echo "El producto seleccionado tiene ventas asociadas.Si elimina este producto también se eliminarán dichas ventas sociadas.";
                        echo "¿Desea eliminar el producto y sus ventas asociadas?";
                        echo '<input type="submit" value="Eliminar Producto y Ventas" name="eliminar_asociadas" />';
                        echo '<input type="submit" value="Cancelar" name="cancelar" />';
                    }else{
                        echo "Se va a proceder a la eliminacion del producto seleccionada.¿Está seguro?";
                        echo '<input type="submit" value="Eliminar Producto" name="eliminar" />';
                        echo '<input type="submit" value="Cancelar" name="cancelar" />';
                    }
                }
                echo '</div>';

                echo '<div class="centrar-horizont2">';
                if(isset($_POST['eliminar_asociadas'])){
                    $sql="DELETE FROM ventas WHERE refProducto='$productos'";
                    realizar_operacion("ventas_comerciales",$sql);
                    $sql="DELETE FROM productos WHERE referencia='$productos'";
                    $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo '<p class="correcto">Operacion realizada con exito</p>';
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;eliminarPro.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
                }
                echo '</div>';

                echo '<div class="centrar-horizont2">';
                if(isset($_POST['eliminar'])){
                    $sql="DELETE FROM productos WHERE referencia='$productos'";
                    $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo '<p class="correcto">Operacion realizada con exito</p>';
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;eliminarPro.php");
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