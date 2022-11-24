
      <?php
        // Conectamos a la base de datos
        $con = conexion_bd();
        
        consulta_full_anuncios($con);
        
        //Desconexión de la BD
        unset($con);
      ?>

 

