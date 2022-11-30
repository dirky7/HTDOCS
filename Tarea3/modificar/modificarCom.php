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
        <h1>Indique el comercial que desea modificar:</h1>
        <div class="centrar-horizont">
            <form action="" method="post" class="eliminar">
                <span>Comerciales:</span>
                <!--Creamos un despegable con los comerciales almacenados en la base de datos-->
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
                <input type="submit" value="Modificar Comercial" name="enviar" />

                <?php
                    //Una vez seleccionamos una venta y le demos a enviar se muestra un formulario con los datos de la venta cargados
                    if(isset($_POST['enviar'])){
                        $sql="SELECT * FROM comerciales WHERE codigo='$comerciales'";
                        $resultado = $conexion->query($sql);
                        if ($resultado) {
                            $row = $resultado->fetch();
                            while ($row != null) {
                                echo "<br><br><label>codigo</label>";
                                echo "<input type='text' name='codigo' value=".$row['codigo']." disabled required>";
                                echo "<br><br><label>nombre</label>";
                                echo "<input type='text' name='nombre' value='${row['nombre']}' required>";
                                echo "<br><br><label>salario</label>";
                                echo "<input type='number' name='salario' step='any' value=".$row['salario']." required>";
                                echo "<br><br><label>hijos</label>";
                                echo "<input type='number' name='hijos' step='any' value=".$row['hijos']." required >";
                                echo "<br><br><label>Fecha de Nacimiento</label>";
                                echo "<input type='date' name='fechaNac' value=".$row['fNacimiento']." required >";
                                echo "<br><br><input type='submit' value='Realizar Cambios' name='modificar' required >";
                                $row = $resultado->fetch();
                            }
                        }
                    }

                    if(isset($_POST['modificar'])){
                        $nombre=$_POST['nombre'];
                        $salario=$_POST['salario'];
                        $hijos=$_POST['hijos'];
                        $fecha=$_POST['fechaNac'];
                        $sql="UPDATE comerciales SET nombre='$nombre',salario=$salario,hijos=$hijos,fNacimiento='$fecha' WHERE codigo='$comerciales'";
                        $operacion_correcta=realizar_operacion("ventas_comerciales",$sql);
                        if($operacion_correcta){
                            echo "<p class='correcto'>Operacion realizada con exito</p>";
                            //Si la operacion es correcta mostramos el mensaje y actualizamos la pagina pasdos 4 segundos para ver los datos actualizados
                            header("refresh:4;modificarCom.php");
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