<?php
    include "database.php";
    class ClaseDB{
 
    //Conexión a la base de datos
    public function conectar(){
        try{
          $conexion=new PDO(DSN,USUARIO,PASSWORD);
          $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
          echo $e->getMessage();
        }
        return $conexion;
      }
       //Matriz de datos
    public static function matrizDatos($sql){
        try{
          $conexion=new PDO(DSN,USUARIO,PASSWORD);
          $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $sentencia=$conexion->prepare($sql);
          $sentencia->setFetchMode(PDO::FETCH_ASSOC);
          $sentencia->execute();
          $datos=$sentencia->fetchAll();
        }catch(PDOException $e){
          echo $e->getMessage();
        }
        return $datos;
      }

      //Matriz de Objetos
    public static function matrizObjeto($sql){
        try{
          $conexion=new PDO(DSN,USUARIO,PASSWORD);
          $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $sentencia=$conexion->prepare($sql);
          $sentencia->setFetchMode(PDO::FETCH_OBJ);
          $sentencia->execute();
          $datos=$sentencia->fetchAll();
        }catch(PDOException $e){
          echo $e->getMessage();
        }
        return $datos;
      }
    //Inserta un registro
    public function insertar($sql){
      $conexion=$this->conectar();
      $todo_bien=true;
      //iniciamos la transacción
      $conexion->beginTransaction();
      if ($conexion->exec($sql)==0)
        $todo_bien=false;
      if ($todo_bien){
        $conexion->commit();
        print "<p>Los cambios se han realizado correctamente</p>";
      }else{
        $conexion->rollback();
        print "<p>No se han podido realizar los cambios</p>";
      }
      unset($conexion);
    }
    public function borrarUsuario($query){
      $conexion=$this->conectar();
      $conexion->exec($query);
      unset($conexion);
    }
    
    public function modificarUsuario($query){
      $conexion=$this->conectar();
      $conexion->exec($query);
      unset($conexion);
    }


    
    }
?>