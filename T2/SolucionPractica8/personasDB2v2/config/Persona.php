<?php
class Persona{
    private $id;
    private $nombre;
    private $apellidos;
    private $direccion;
 
    public function __construct($id,$nombre,$apellidos,$direccion)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->direccion=$direccion;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getDireccion(){
        return $this->direccion;
    }

    public function setId($id){
        $this->id=$id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }

    //existe identificador en array de personas
    public static function existeId($datos,$id){
        $existe=false;
        foreach($datos as $reg){
          if ($reg->getId()==$id){
            $existe=true;
          }
        }
        return $existe;
      }
}
?>