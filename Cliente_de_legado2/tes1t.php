<?
class farray{
    function __construct(){
    }

  public function imprimirElementos($myArray){
    $int = count($myArray);
    for($i = 0; $i <$int; $i++){
      echo $myArray[$i];
      echo "<br>";
    }
  }

    public function hola(){
        echo "hola";
    }

    function agregarElemento($myArray, $elemento){
    array_push($myArray, $elemento);
        $this->hola();
    return $myArray;
  }

  function eliminarElemento($myArray, $posicion) {
    $arrayTemp = Array();
    $int = count($myArray);
    for($i=0; $i < $int; $i++){
      if($posicion==$i) $i++;
    }
    $myArray = $arrayTemp;
    return $myArray; 
  }

}

?>