
<?php
class Tabla {
  private $mat=array();
  private $colorFuente=array();
  private $colorFondo=array();
  private $cantFilas;
  private $cantColumnas;

  public function __construct($fi,$co)
  {
    $this->cantFilas=$fi;
    $this->cantColumnas=$co;
	for($i=0;$i<=$fi;$i++)
		for($j=0;$j<=$co;$j++){
			$this->mat[$i][$j]="";
			$this->colorFuente[$i][$j]="black";
			$this->colorFondo[$i][$j]="white";
		}
  }

  public function cargar($fila,$columna,$valor,$cfue,$cfon)
  {
    $this->mat[$fila][$columna]=$valor;
    $this->colorFuente[$fila][$columna]=$cfue;
    $this->colorFondo[$fila][$columna]=$cfon;
  }

  public function inicioTabla()
  {
    echo '<table border="1">';
  }

  public function inicioFila()
  {
    echo '<tr>';
  }

  public function mostrar($fi,$co)
  {
    echo '<td style="color:'.$this->colorFuente[$fi][$co].';background-color:'.$this->colorFondo[$fi][$co].'">'.$this->mat[$fi][$co].'</td>';
  }

  public function finFila()
  {
    echo '</tr>';
  }

  public function finTabla()
  {
    echo '</table>';
  }

  public function graficar()
  {
    $this->inicioTabla();
    for($f=0;$f<$this->cantFilas;$f++)
    {
      $this->inicioFila();
      for($c=0;$c<$this->cantColumnas;$c++)
      {
         $this->mostrar($f,$c);
      }
      $this->finFila();
    }
    $this->finTabla();
  }
}


?>
