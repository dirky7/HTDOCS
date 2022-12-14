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

        <h1>Introduzca los datos del nuevo producto:</h1>
        <div class="centrar-horizont2">
            <form action="" method="post">
                <label>Referencia</label>
                <input type="text" name="referencia" required><br><br>
                <label>Nombre</label>
                <input type="text" name="nombre" required><br><br>
                <label>Descripcion</label>
                <input type="text" name="descripcion"><br><br>
                <label>Precio</label>
                <input type="number" name="precio" step="any" required><br><br>
                <label>Descuento</label>
                <input type="number" name="descuento" step="any" required><br><br>
                <input type="submit" name="enviar" value="Insertar Producto">
            </form>
        </div>

        <?php
            include "../funciones/funciones.php";
            echo '<div class="centrar-horizont2">';
            if(isset($_POST['enviar'])){
                $referencia=$_POST['referencia'];
                $nombre=$_POST['nombre'];
                $descripcion=$_POST['descripcion'];
                $precio=$_POST['precio'];
                $descuento=$_POST['descuento'];
                $sql="INSERT INTO productos (referencia,nombre,descripcion,precio,descuento) VALUES ('$referencia', '$nombre','$descripcion',$precio,$descuento);";
                $operacion_correcta=realizar_operacion("venta_comerciales",$sql);
                    if($operacion_correcta){
                        echo "<p class='correcto'>Operacion realizada con exito</p>";
                        //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                        header("refresh:4;insertarPro.php");
                    }else{
                        echo "<p class='error'>No ha sido posible realizar la operacion</p>";
                    }
            }
            echo '</div>';
        ?>
    </div>
</body>

</html>