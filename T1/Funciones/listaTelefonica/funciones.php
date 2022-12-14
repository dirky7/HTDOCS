<?php

//Busca un nombre en el array y devuelve la posici�n o false si no lo encuentra
function existe($miarray,$miNombre){
        $posicion=array_search($miNombre,$miarray,false);
        return $posicion;
       }
//Agrega un telefono a partir de la posici�n pos
function agregar($array,$nom,$tel,$pos){
    $array[$pos]=$nom;
    $array[$pos+1]=$tel;
    echo "<div class='altoDch1'>DATO A�ADIDO</div>";
	return $array;
}
//Si no est�n vacios el nombre y el telefono y no est� en el array se puede insertar	
function validarInsertar($array,$nom,$tel){
	if(!empty($nom)){
        $si=existe($array,$nom);
        if(!empty($tel)){
          if (!($si || $si===0)){
            return true;  //podemos agregar el dato
          }else{
			 echo "<div class='altoDch1'><p>DATO YA EXISTE</p></div>"; 
			 return false;
		  }
        }else{
          //Si est� vacio el tel�fono
		   echo "<div class='altoDch2'><p>FALTA EL TELÓFONO</p></div>"; 
		   return false;
		}
        }else{
		   //Si est� vacio el nombre
				echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
				return false;
			}
	   }

//Si el nombre est� lo borra
function borrar($array,$nom){
	if(!empty($nom)){
        $si=existe($array,$nom);
        if ($si || $si===0){
            unset($array[$si]);
			unset($array[$si+1]);
			$array=array_values($array);
			echo "<div class='altoDch1'><p>DATO ELIMINADO</p></div>";
		  }else{
			 echo "<div class='altoDch1'><p>EL REGISTRO NO EXISTE</p></div>"; 
		  }
        }else{
		   //Si est� vacio el nombre
				echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
			}
		return $array;
}

//Modificar el registro
function modificar($array,$nom,$tel){
	if(!empty($nom)){
        $si=existe($array,$nom);
        if(!empty($tel)){
          if (!($si || $si===0)){
            echo "<div class='altoDch1'><p>EL REGISTRO NO EXISTE</p></div>";   //el dato est� agregado
          }else{
			 echo "<div class='altoDch1'><p>DATO MODIFICADO</p></div>"; 
			 $array[$si+1]=$tel;
		  }
        }else{
          //Si est� vacio el tel�fono
		   echo "<div class='altoDch2'><p>FALTA EL TEL�FONO</p></div>"; 
		}
        }else{
		   //Si est� vacio el nombre
				echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
			}
			return $array;
}
//Dibujamos una tabla con los datos
function mostrarTabla($array){
	if (count($array)>1){
			echo "<h1>List&iacute;n telef&oacute;nico:</h1>";
			echo "<table><tr align='center'><th>Nombre</th><th>Tel&eacute;fono</th></tr>";
			for ($i=0 ; $i < count($array) ; $i+=2){
				if($array[$i]!==NULL && $array[$i+1]!==NULL)
					echo "<tr><td>".$array[$i]."</td><td>".$array[$i+1]."</td></tr>"; 
			}
			echo "</table>";
		}
}	

//Dibujamos otra tabla con los datos
function mostrarTabla2($array){
	if (count($array)>1){
			echo "<h1>List&iacute;n telef&oacute;nico:</h1>";
			echo "<table><tr align='center'><th>Id</th><th>Nombre</th><th>Tel&eacute;fono</th></tr>";
			for ($i=0 ; $i < count($array) ; $i+=2){
				if($array[$i]!==NULL && $array[$i+1]!==NULL)
					echo "<tr><td>".(($i/2)+1)."</td><td>".$array[$i]."</td><td>".$array[$i+1]."</td></tr>"; 
			}
			echo "<tr><td colspan='2'>NUM. REGISTROS</td><td>".(count($array)/2)."</td></tr>";
			echo "</table>";
		}
}	
?>