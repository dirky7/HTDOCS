<?php
//Visualizar tabla JSON
function visualizarTablaJSON(){
    if(!file_exists("miembros.json")){
        echo "<tr><td colspan='5'>El fichero no existía y se ha creado</td></tr>";
        $fichero=fopen("miembros.json","w");
        $formato="[]";
        fwrite($fichero,$formato);
        fclose($fichero);
    }else{
        $datos_miembros = file_get_contents("miembros.json");
	    $json_miembros = json_decode($datos_miembros, true);
        $indice=0;
	    foreach($json_miembros as $miembro){
            echo "<tr>";
            echo "<td>".$miembro['nombre']."</td>";
            echo "<td>".$miembro['email']."</td>";
            echo "<td>".$miembro['telefono']."</td>";
            echo "<td>".$miembro['creado']."</td>";
            echo "<td>".$miembro['estado']."</td>";
            echo "<td><a href='update.php?edit_id=$indice' class='btn btn-success pull-right'>Actualizar</a></td>
                   <td><a href='delete.php?delete_id=$indice' class='btn btn-success pull-right'>Borrar</a>
            </td>";
            echo "</tr>";
            $indice++;
	}
    }
	
}
function convertirEstado($estado){
    if(strlen($estado)==1)
        if($estado=='1'){
            return "Activo";
        }
        else{
            return "Inactivo";
        }
    else{
        if($estado=="Activo")
            return '1';
        else
            return '0';
    }
}

function buscarId($data,$id){
    $encontrado=false;
    foreach($data as $miembro){
        if($miembro['id']==$id){
            $encontrado=true;
        }
    }
    return $encontrado;
}
?>