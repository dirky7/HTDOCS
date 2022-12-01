<?php
     include "funciones.php";
     //Conectarse a la base de datos
    $con=conexion_bd("test");
    //Consulta a la base de datos
    $sql="select * from miembros";
    $query=$con->query($sql);
    

    //Recorremos la BD y vamos creando filas
    if($query){
        //variables que necesitamos para crear el fichero csv
        $delimitador=",";
        $filename="miembros_".date('Y-m-d').".csv";
        //creamos un puntero al fichero
        $f=fopen('php://memory','w');
        //Cabeceras
        $campos=array('Id','Nombre','Email','Telefono','Creado','Modificado','Estado');
        fputcsv($f,$campos,$delimitador);
        //Salida de datos
        $row=$query->fetch();
        while ($row!=null){
            $estado=($row['estado']=='1')?'Activo':'Inactivo';
            $lineaDatos=array($row['id'],$row['nombre'],$row['email'],$row['telefono'],$row['creado'],$row['modificado'],$estado);
            //escribimos el fichero
            fputcsv($f,$lineaDatos,$delimitador);
            $row=$query->fetch();
        }
        unset($con);
        //Nos movemos al principio del fichero
        fseek($f,0);
        //Establecer cabeceras
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        //Escribir toda la información restante de un puntero a un fichero
        fpassthru($f);
    }

?>