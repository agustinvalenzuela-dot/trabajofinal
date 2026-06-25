<?php
    $coleccionDeJuegos = [];
    $coleccionDeJuegos[0] = ["jugador1" => "Max", "aciertos1" => 3, "jugador2" => "Mona", "aciertos2" => 1];
    $coleccionDeJuegos[1] = ["jugador1" => "Michael", "aciertos1" => 1, "jugador2" => "Trevor", "aciertos2" => 3];
    $coleccionDeJuegos[2] = ["jugador1" => "Daigo", "aciertos1" => 2, "jugador2" => "Justin", "aciertos2" => 2];
    $coleccionDeJuegos[3] = ["jugador1" => "Guile", "aciertos1" => 3, "jugador2" => "Ingrid", "aciertos2" => 1];
    $coleccionDeJuegos[4] = ["jugador1" => "Max", "aciertos1" => 1, "jugador2" => "Michael", "aciertos2" => 3];
    $coleccionDeJuegos[5] = ["jugador1" => "Trevor", "aciertos1" => 2, "jugador2" => "Zangief", "aciertos2" => 2];
    $coleccionDeJuegos[6] = ["jugador1" => "Mona", "aciertos1" => 1, "jugador2" => "Justin", "aciertos2" => 3];
    $coleccionDeJuegos[7] = ["jugador1" => "Ingrid", "aciertos1" => 1, "jugador2" => "Guile", "aciertos2" => 3];
    $coleccionDeJuegos[8] = ["jugador1" => "Zangief", "aciertos1" => 3, "jugador2" => "Max", "aciertos2" => 1];
    $coleccionDeJuegos[9] = ["jugador1" => "Gye", "aciertos1" => 2, "jugador2" => "Daven", "aciertos2" => 2];
    $juego = [];
    $indiceJuegoGanado = 0;
    $salir = true;
    $i = 0 ;
    $jugador = "Daven";


    /** 
 * Mostrar en pantalla los datos de un juego en especifico.
 * @param array $coleccionDeJuegos
 * @param INT $indice
 */
function datosDeJuego($coleccionDeJuegos, $indice){
    // array $arregloAux
    // string $resultadojuego

    //como al usuario le pedimos un juego del 1 al 10 por ejemplo, para ubicar el correcto arreglo cuyo indice va de 0 a 9, le restamos 1.
    $arregloAux = [];
    $arregloAux = $coleccionDeJuegos[$indice - 1];

    $resultadojuego = " ";
    if ($arregloAux["aciertos1"] == $arregloAux["aciertos2"]){
        $resultadojuego = "(empate)";
    } 
    elseif($arregloAux["aciertos1"] > $arregloAux["aciertos2"]){
        $resultadojuego = "(gano jugador 1)";
    }
    elseif($arregloAux["aciertos1"] < $arregloAux["aciertos2"]){
        $resultadojuego = "(gano jugador 2)";
    }
    else{

    }
        
    echo "**************************************\n";
    echo "Juego MEMORIA: ".$indice." ".$resultadojuego."\n";
    echo "Jugador 1: ".$arregloAux["jugador1"]." obtuvo ".$arregloAux["aciertos1"]." aciertos\n";
    echo "Jugador 2: ".$arregloAux["jugador2"]." obtuvo ".$arregloAux["aciertos2"]." aciertos\n";
    echo "**************************************\n";
}


    /** estaklsfja
     * @param array $coleccionDeJuegos
     * @param string $jugador
     * @return int
     */
    function primerJuegoGanado($coleccionDeJuegos, $jugador) {
        $i = 0;
        $resultado = -1;

        while ($i < count($coleccionDeJuegos) && $resultado == -1) {
            $juego = $coleccionDeJuegos[$i];

            if ($juego["jugador1"] == $jugador && $juego["aciertos1"] > $juego["aciertos2"]){
            $resultado = $i;
            }
            if ($juego["jugador2"] == $jugador && $juego["aciertos2"] > $juego["aciertos1"]){
            $resultado = $i;
            }

            $i++;
        }

        return $resultado;
    }
    
    
    $indice = 0;
    $indice = primerJuegoGanado($coleccionDeJuegos, $jugador);
    echo "el indice es: ".$indice."\n";

    if ($indice == -1){
        echo "el jugador ".$jugador." no gano ningun juego.\n";
    }
    else{
        $indice = $indice + 1;
        datosDeJuego($coleccionDeJuegos, $indice);
    }