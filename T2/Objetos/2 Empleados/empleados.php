<?php
class Empleado {
    private string $nombre;
    private string $apellidos;
    private int $sueldo;
    private $telefonos = array();

    //Metodos setter
    public function setNombre (string $nom) {
        $this -> nombre = $nom;
    }

    public function setApellidos (string $ape) {
        $this -> apellidos = $ape;
    }

    public function setSueldo (int $sue) {
        $this -> sueldo = $sue;
    }

    //Metodos getter
    public function getNombre() : string {
        return $this -> nombre;
    }

    public function getApellidos() : string {
        return $this -> apellidos;
    }

    public function getSueldo() : int {
        return $this -> sueldo;
    }

    //Obtener el nombre completo
    public function getNombreCompleto() {
        $nombre = $this -> nombre;
        $apellidos = $this -> apellidos;
        return $nombre. " " .$apellidos;
    }

    //Pagar impuesto si el sueldo es superior a 3333€
    public function debePagarImpuestos() {
        $pagar = false;
        if (($this -> suledo) > 3333)
            $pagar = true;
        return $pagar;
    }

    //Añadir telefono al array
    public function anyadirTelefono(int $telefono) {
        array_push($this -> telefonos,$telefono);
    }

    //Mostrar telefonos
    public function listarTelefonos() {
        if (count($this -> telefonos) > 0) {
            echo "<h2>".$this -> getNombreCompleto()." ".implode(",", $this -> telefonos)."</h2>";
        }
        else {
            echo "<h2>".$this -> getNombreCompleto()."<br>"."Lista de telefonos vacia"."</h2>";
        }
    }

    //Vaciar telefonos
    public function vaciarTelefonos() {
        $this -> telefonos = array();
    }
}
?>