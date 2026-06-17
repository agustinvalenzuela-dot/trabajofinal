<?php
    $juego0 =  ["jugador1" => "Agus",
               "aciertos1" => 3,
               "jugador2" => "Evilagus",
               "aciertos2" => 1];

    $juego1 =  ["jugador1" => "Agus",
               "aciertos1" => 3,
               "jugador2" => "Cami",
               "aciertos2" => 1];

    $coleccionDeJuegos= [];
    $coleccionDeJuegos[0]= $juego0;
    $coleccionDeJuegos[1]= $juego1;

    
    $juego2 = ["jugador1" => "Cami",
                "aciertos1" => 5,
                "jugador2" => "Evilagus",
                "aciertos2" => 2];
    
    function agregarJuego($coleccionDeJuegos, $juego) {
    $coleccionDeJuegos[] = $juego; //al parecer asi se agrega una nueva entrada al arreglo xd
    return $coleccionDeJuegos;
    }            

    $coleccionDeJuegos = agregarJuego($coleccionDeJuegos, $juego2);

    foreach ($coleccionDeJuegos as $indice => $juego) { //recorre la colección.
    echo "=== Juego $indice ===\n";
    foreach ($juego as $clave => $valor) {  //recorre cada juego para mostrar sus claves y valores.
        echo "$clave: $valor\n";
    }
    echo "\n";
}