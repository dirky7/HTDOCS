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

        <h1>Indique el producto que desea modificar:</h1>
        <div class="centrar-horizont">
        <form action="" method="post" class="eliminar">
            <span>Productos:</span>
            <!--Creamos un despegable con los productos almecenados en la base de datos-->
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
            <input type="submit" value="Modificar Productos" name="enviar" />

            <?php
                //Una vez seleccionemos un productos y le demos a enviar se muestra un formulario con los datos del producto cargados
                if(isset($_POST['enviar'])){
                    $sql="SELECT * FROM productos WHERE referencia='$productos'";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        $row = $resultado->fetch();
                        while ($row != null) {
                            echo "<br><br><label>Referencia</label>";
                            echo "<input type='text' name='referencia' value=".$row['referencia']." disabled required>";
                            echo "<br><br><label>Nombre</label>";
                            echo "<input type='text' name='nombre' value='${row['nombre']}' required>";
                            echo "<br><br><label>Descripcion</label>";
                            echo "<input type='text' name='descripcion' value=".$row['descripcion'].">";
                            echo "<br><br><label>Precio</label>";
                            echo "<input type='number' name='precio' step='any' value=".$row['precio']." required >";
                            echo "<br><br><label>Descuento</label>";
                            echo "<input type='number' name='descuento' step='any' value=".$row['descuento']." required >";
                            echo "<br><br><input type='submit' value='Realizar Cambios' name='modificar' required >";
                            $row = $resultado->fetch();
                        }
                    }
                }

                if(isset($_POST['modificar'])){
                    $nombre=$_POST['nombre'];
                    $descripcion=$_POST['descripcion'];
                    $precio=$_POST['precio'];
                    $descuento=$_POST['descuento'];
                    $sql="UPDATE productos SET nombre='$nombre',descripcion='$descripcion',precio=$precio,descuento=$descuento WHERE referencia='$productos'";
                    $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                    if($operacion_correcta){
                        echo "<p class='correcto'>Operacion realizada con exito</p>";
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;modificarPro.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
                }
                unset($conexion);
            ?>
        </form>
        </div>

    </div>

</body>

</html>