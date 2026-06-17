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
    echo "ingrese un indice:";
    $indice = trim(fgets(STDIN));
    $arregloAux =  $coleccionDeJuegos[$indice];
    $resultadojuego = " ";
    if ($arregloAux["aciertos1"] == $arregloAux["aciertos2"]){
        $resultadojuego = "empate";
    } 
    elseif($arregloAux["aciertos1"] > $arregloAux["aciertos2"]){
        $resultadojuego = "gano jugador 1";
    }
    elseif($arregloAux["aciertos1"] < $arregloAux["aciertos2"]){
        $resultadojuego = "gano jugador 2";
    }
    else{

    }
        
    echo "**************************************\n";
    echo "Juego MEMORIA: $indice $resultadojuego\n";
    echo "Jugador 1: ".$arregloAux["jugador1"]." obtuvo ".$arregloAux["aciertos1"]." aciertos\n";
    echo "Jugador 2: ".$arregloAux["jugador2"]." obtuvo ".$arregloAux["aciertos2"]." aciertos\n";
    echo "**************************************\n";
