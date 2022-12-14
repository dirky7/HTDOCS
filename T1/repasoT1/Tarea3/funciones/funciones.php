<?php

    //------------Funcion general usada para crear la conexion con la base de datos------------------

    function conectar_bd($base){
        try{
            $conexion=new PDO("mysql:host=localhost;dbname=".$base,"root","");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           }catch(PDOException $e){
            echo $e->getMessage();
           }
            return $conexion;
    }
    //--------------------Funciones utilizadas para la opcion CONSULTAR----------------------

    function mostrar_tabla_ventas($id_comercial,$base){
        $sql="select productos.referencia, productos.nombre, productos.descripcion,productos.precio,productos.descuento,ventas.cantidad,ventas.fecha
        from productos inner join ventas on refProducto=referencia inner join comerciales on codigo=codComercial
        where codigo='$id_comercial'";
        $conexion=conectar_bd($base);
        $resultado=$conexion->query($sql);
        if($resultado){
            echo "<table><tr><th>Referencia</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Descuento</th><th>Cantidad</th><th>Fecha</th></tr>";
            $row=$resultado->fetch();
            while($row!=null){
                echo "<tr>";
                echo "<td>".$row['referencia']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['descripcion']."</td>";
                echo "<td>".$row['precio']."</td>";
                echo "<td>".$row['descuento']."</td>";
                echo "<td>".$row['cantidad']."</td>";
                echo "<td>".$row['fecha']."</td>";
                echo "</tr>";
                $row = $resultado->fetch();
            }
            echo "</table>";
        }
        unset($conexion);
    }

    //--------------------Funciones utilizadas para realizar operaciones de actualizacion en INSERTAR  MODIFICAR ELIMINAR----------------------

    function realizar_operacion($base,$sql){
        $conexion=conectar_bd($base);
        try{
            $conexion->exec($sql);
            return true;
        }catch(PDOException $e){
            $error = $e->getCode();
            $mensaje = $e->getMessage();
            return false;
        }
        unset($conexion);
    }

    //--------------------Funcion utilizada para ver si un producto o comercial tiene ventas asociadas----------------------
    function tiene_ventas_asociadas($base,$sql){
        try{
            $conexion=conectar_bd($base);
            $resultado=$conexion->query($sql);
            if($resultado){

                $row=$resultado->fetch();
                if($row!=null){
                    return true;
                    echo "Se ha llegado a true";
                }else{
                    return false;
                    echo"Se ha llegado a false";
                }

            }else{
                return false;
            }
        }catch(PDOException $e){
            return false;
        }
        unset($conexion);
    }

?>