<?php
    class Cabecera{
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;

        public function __construct($tit,$ubi,$colorFue,$colorFon){
            $this->titulo=$tit;
            $this->ubicacion=$ubi;
            $this->colorFuente=$colorFue;
            $this->colorFondo=$colorFon;
        }
        public function dibujar(){
            $dibujo = "<div style='font-size:40px;text-align:".$this->ubicacion;
            $dibujo .=";background-color:".$this->colorFondo.";color:".$this->colorFuente.";";
            $dibujo .="'>".$this->titulo."</div>";
            return $dibujo;
        }
    }
?>