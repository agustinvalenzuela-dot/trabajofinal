<?php
include_once("memoria.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/** arreglo con ejemplos de juegos
 * 
 */
function cargarJuegos(){
    $juego1 =  ["jugador1" => "Agus",
               "aciertos1" => 3,
               "jugador2" => "Evilagus",
               "aciertos2" => 1];

    $juego2 =  ["jugador1" => "Agus",
               "aciertos1" => 3,
               "jugador2" => "Cami",
               "aciertos2" => 1];

    $juego3 =  ["jugador1" => "Axel",
               "aciertos1" => 2,
               "jugador2" => "Agus",
               "aciertos2" => 2];

    $coleccionDeJuegos= [];
    $coleccionDeJuegos[0]= $juego1;
    $coleccionDeJuegos[1]= $juego2;
    $coleccionDeJuegos[2]= $juego3;
}

/**
 * FUNCION HECHA CON CLAUDE !!!!!!!!!!!!!!!!
 * REVISAR AL FINAL AHHHHHHHHHHHHHHH
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Solicita al usuario un número dentro de un rango válido.
 * Repite la solicitud hasta recibir un valor correcto.
 *
 * @param int|float $min  Valor mínimo aceptado (inclusive)
 * @param int|float $max  Valor máximo aceptado (inclusive)
 * @return int|float      Número válido ingresado por el usuario
 */
function pedirNumeroEnRango(int|float $min, int|float $max): int|float
{
    while (true) {
        echo "Ingrese un número entre $min y $max: ";
        $entrada = trim(fgets(STDIN));

        // Validar que sea numérico
        if (!is_numeric($entrada)) {
            echo "  ✗ Error: '$entrada' no es un número válido.\n";
            continue;
        }

        $numero = $entrada + 0; // Convierte a int o float automáticamente

        // Validar el rango
        if ($numero < $min || $numero > $max) {
            echo "  ✗ Error: El número debe estar entre $min y $max.\n";
            continue;
        }

        // Número válido
        return $numero;
    }
}

function seleccionarOpcion(){
    echo "\n===== MENÚ PRINCIPAL =====\n";
    echo "[1]Jugar a memoria.\n";
    echo "[2]Mostrar un Juego.\n";
    echo "[3]Mostrar el primer juego ganador.\n";
    echo "[4]Mostrar porcentaje de Juegos ganados.\n";
    echo "[5]Mostrar resumen de Jugador.\n";
    echo "[6]Mostrar listado de juegos Ordenado por jugador 2.\n";
    echo "[7]Salir.\n";
    
    do {
        echo "Ingrese una opcion del menu(1-7): ";
        $opcion= (int) trim(fgets(STDIN));
            if ($opcion < 1 || $opcion > 7){
                echo "x Error: Opción fuera de rango. Elija entre 1 y 7.\n";
            }
    } while ($opcion < 1 || $opcion > 7);

   return $opcion;

}

function datosDeJuego($coleccionDeJuegos, $indice){
    
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
}

function agregarJuego($coleccionDeJuegos, $juego) {
    $coleccionDeJuegos[] = $juego; //al parecer asi se agrega una nueva entrada al arreglo xd
    return $coleccionDeJuegos;
    }    



/** solucion de indicePrimerJuegoGanado escrita con el foreach, revisar
 * function indicePrimerJuegoGanado($coleccionDeJuegos, $jugador) {
 *   foreach ($coleccionDeJuegos as $indice => $juego) {
 *       if ($juego["jugador1"] === $jugador && $juego["aciertos1"] > $juego["aciertos2"]) {
 *           return $indice;
 *       }
 *       if ($juego["jugador2"] === $jugador && $juego["aciertos2"] > $juego["aciertos1"]) {
 *           return $indice;
 *       }
 *   }
 *   return -1; // no se encontró ningún juego ganado por ese jugador
 * } */

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
function resumenDelJugador($coleccionDeJuegos, $jugador){  
    // inicio el arreglo con la claves nombradas
    $resumenDeJugador = [];
    $resumenDeJugador =  ["nombre" => " ",
                          "juegosGanados" => 0,
                          "juegosPerdidos" => 0,
                          "juegosEmpatados" => 0,
                          "aciertosAcumulados" => 0];

for ($i = 0; $i < count($coleccionDeJuegos); $i++){
        $juego = $coleccionDeJuegos[$i];

        if($juego["$jugador1"] == $jugador || $juego["$jugador2"] == $jugador){
            if ($arregloAux["aciertos1"] == $arregloAux["aciertos2"]){
                $acumjuegosEmpatados = $acumjuegosEmpatados + 1;
                $acumAciertos = $acumAciertos + 2;
            } 
            elseif($arregloAux["aciertos1"] > $arregloAux["aciertos2"]){
                // aca esta la rama donde gano el jugador 1
                if ($juego["$jugador1"] == $jugador){
                $acumJuegosGanados = $acumJuegosGanados + 1;
                $acumAciertos = $acumAciertos + 3;
                }
                else{
                $acumJuegosPerdidos = $acumJuegosPerdidos + 1;
                $acumAciertos = $acumAciertos + 1;
                }                
            }
            elseif($arregloAux["aciertos1"] < $arregloAux["aciertos2"]){
                // aca esta la rama donde gano el jugador 2
                if ($juego["$jugador2"] == $jugador){
                $acumJuegosGanados = $acumJuegosGanados + 1;
                $acumAciertos = $acumAciertos + 3;
                }
                else{
                $acumJuegosPerdidos = $acumJuegosPerdidos + 1;
                $acumAciertos = $acumAciertos + 1;
                }
            }
            else{
            }
        }
        else{
            echo "no se encontro el nombre del jugador";
        }
    }  
    
    $resumenDeJugador["nombre"] = "$jugador";
    $resumenDeJugador["juegosGanados"] = $acumJuegosGanados;
    $resumenDeJugador["juegosPerdidos"] = $acumJuegosPerdidos;
    $resumenDeJugador["juegosEmpatados"] = $acumjuegosEmpatados;
    $resumenDeJugador["aciertosAcumulados"] = $acumAciertos;

    echo "**************************************\n";
    echo "Jugador: $jugador\n";
    echo "Ganó: ".$acumJuegosGanados." juegos\n";
    echo "Perdió: ".$acumJuegosPerdidos." juegos\n";
    echo "Empató: ".$acumjuegosEmpatados." juegos\n";
    echo "Total de aciertos acumulados: ".$acumAciertos." aciertos\n";    
    echo "**************************************\n";                       

    


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:



//Proceso:

// Estas 3 líneas de código ejecutan el juego y muestran el arreglo retornado con los resultado
// Probar la primera vez y luego comentar/borrar
//$juego = jugarMemoria();
//echo "jugador 1 " . $juego["jugador1"] . ": " . $juego["aciertos1"] . " aciertos" . "\n";
//echo "jugador 2 " . $juego["jugador2"] . ": " . $juego["aciertos2"] . " aciertos" . "\n";




/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;

        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;

        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
        //...
    }
} while ($opcion != 7);
*/