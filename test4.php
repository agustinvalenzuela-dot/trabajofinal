<?php
   
    $juego0 =  ["jugador1" => "Agus",
               "aciertos1" => 3,
               "jugador2" => "Evilagus",
               "aciertos2" => 1];

    $juego1 =  ["jugador1" => "Agus",
               "aciertos1" => 1,
               "jugador2" => "Cami",
               "aciertos2" => 3];
   
    $coleccionDeJuegos= [];
    $coleccionDeJuegos[0]= $juego0;
    $coleccionDeJuegos[1]= $juego1;
    $jugador = "Cami";

function indicePrimerJuegoGanado($coleccionDeJuegos, $jugador){
   for ($i = 0; $i < count($coleccionDeJuegos); $i++) {
        $juego = $coleccionDeJuegos[$i];
        if ($juego["jugador1"] === $jugador && $juego["aciertos1"] > $juego["aciertos2"]) {
            return $i;
        }
        if ($juego["jugador2"] === $jugador && $juego["aciertos2"] > $juego["aciertos1"]) {
            return $i;
        }
    }
    return -1;
}
 
$test = indicePrimerJuegoGanado($coleccionDeJuegos, $jugador);
echo "$test.\n";