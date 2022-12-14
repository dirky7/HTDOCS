<?php
class MayorMenor {
    private int $mayor;
    private int $menor;

    public function setMayor (int $may) {
        $this -> mayor = $may;
    }

    public function setMenor (int $men) {
        $this -> menor = $men;
    }

    public function getMayor() : int {
        return $this -> mayor;
    }

    public function getMenor() : int {
        return $this -> menor;
    }

    function maymen(array $numeros): ?MayorMenor {
    $a = max($numeros);
    $b = min($numeros);

    $result = new MayorMenor();
    $result -> setMayor ($a);
    $result -> setMenor ($b);

    return $result;
    }
}

/* #ejemplo llamada a la funcion maymen
$resultado = maymen ([1, 76, 9, 388, 41, 39, 25, 97, 22]);
echo "<br>Mayor: " .$result -> setMayor();
echo "<br>Menor: " .$result -> setMenor();
*/

?>