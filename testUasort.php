<?php
//function cmp($a, $b){
//   return $a <=> $b;
//}

//$a = array("arriba", "banco", "bee", "calefon", 1);

//usort($a, "cmp");

//for ($i = 0; $i < count($a); $i++) {
//    echo "$i: $a[$i]\n";
//}

//function compararPorJugador2($juegoA, $juegoB) {
//    return strcmp($juegoA["jugador2"], $juegoB["jugador2"]);
//}

function compararPorJugador2($juegoA, $juegoB) {
    return $juegoA["jugador2"] <=> $juegoB["jugador2"];
}
function deboUsarUasort($coleccionDeJuegos){
    uasort($coleccionDeJuegos, "compararPorJugador2");
    print_r($coleccionDeJuegos);
}

function cargarJuegos(){
    //ARRAY[] $juegos
    $juegos = [];
    $juegos[0] = ["jugador1" => "Max", "aciertos1" => 3, "jugador2" => "Mona", "aciertos2" => 1];
    $juegos[1] = ["jugador1" => "Michael", "aciertos1" => 1, "jugador2" => "Trevor", "aciertos2" => 3];
    $juegos[2] = ["jugador1" => "Daigo", "aciertos1" => 2, "jugador2" => "Justin", "aciertos2" => 2];
    $juegos[3] = ["jugador1" => "Guile", "aciertos1" => 4, "jugador2" => "Ingrid", "aciertos2" => 0];
    $juegos[4] = ["jugador1" => "Max", "aciertos1" => 1, "jugador2" => "Michael", "aciertos2" => 3];
    $juegos[5] = ["jugador1" => "Trevor", "aciertos1" => 2, "jugador2" => "Zangief", "aciertos2" => 2];
    $juegos[6] = ["jugador1" => "Mona", "aciertos1" => 0, "jugador2" => "Justin", "aciertos2" => 4];
    $juegos[7] = ["jugador1" => "Ingrid", "aciertos1" => 1, "jugador2" => "Guile", "aciertos2" => 3];
    $juegos[8] = ["jugador1" => "Zangief", "aciertos1" => 3, "jugador2" => "Max", "aciertos2" => 1];
    $juegos[9] = ["jugador1" => "Gye", "aciertos1" => 2, "jugador2" => "Daven", "aciertos2" => 2];
    return $juegos;
}

$coleccionDeJuegos = cargarJuegos();
deboUsarUasort($coleccionDeJuegos);

?>

