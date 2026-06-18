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
 * @return array
 */
function cargarJuegos(){
    
    $coleccionDeJuegos[0] = ["jugador1" => "Max", "aciertos1" => 3, "jugador2" => "Mona", "aciertos2" => 1];
    $coleccionDeJuegos[1] = ["jugador1" => "Michael", "aciertos1" => 1, "jugador2" => "Trevor", "aciertos2" => 3];
    $coleccionDeJuegos[2] = ["jugador1" => "Daigo", "aciertos1" => 2, "jugador2" => "Justin", "aciertos2" => 2];
    $coleccionDeJuegos[3] = ["jugador1" => "Guile", "aciertos1" => 4, "jugador2" => "Ingrid", "aciertos2" => 0];
    $coleccionDeJuegos[4] = ["jugador1" => "Max", "aciertos1" => 1, "jugador2" => "Michael", "aciertos2" => 3];
    $coleccionDeJuegos[5] = ["jugador1" => "Trevor", "aciertos1" => 2, "jugador2" => "Zangief", "aciertos2" => 2];
    $coleccionDeJuegos[6] = ["jugador1" => "Mona", "aciertos1" => 0, "jugador2" => "Justin", "aciertos2" => 4];
    $coleccionDeJuegos[7] = ["jugador1" => "Ingrid", "aciertos1" => 1, "jugador2" => "Guile", "aciertos2" => 3];
    $coleccionDeJuegos[8] = ["jugador1" => "Zangief", "aciertos1" => 3, "jugador2" => "Max", "aciertos2" => 1];
    $coleccionDeJuegos[9] = ["jugador1" => "Gye", "aciertos1" => 2, "jugador2" => "Daven", "aciertos2" => 2];

    //$coleccionDeJuegos= []; la inicializacion de este arreglo va en el programa principal.

    return $coleccionDeJuegos;
}

 /** Solicitar al usuario un número dentro de un rango válido.
 * Repite la solicitud hasta recibir un valor correcto.
 *
 * @param int $min  Valor mínimo 
 * @param int $max  Valor máximo 
 * @return int      Número válido ingresado por el usuario */

function solicitarNumero($min, $max){
    do {
        $entrada = 0;
        echo "Ingrese un número entre $min y $max: ";
        $entrada = (int) trim(fgets(STDIN));
    
        if ($entrada < $min || $entrada > $max){
            echo " Error: El número debe estar entre $min y $max.\n";    
        }
    } while ($entrada < $min || $entrada > $max);
return $entrada;     
}

/** Mostrar en pantalla el menu y devolver la opcion que elige el usuario.
 * @return INT 
 */
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

/** Mostrar en pantalla los datos de un juego en especifico.
 * @param array $coleccionDeJuegos
 * @param INT $indice
 */
function datosDeJuego($coleccionDeJuegos, $indice){
    // array $arregloAux

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

/**Agregar un nuevo juego al arreglo coleccion de juegos.
 * @param array $coleccionDeJuegos
 * @param array $juego
 * @return array
 */
function agregarJuego($coleccionDeJuegos, $juego) {
    // array $coleccionDeJuegos
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

/** Obtener el indice del primer juego ganado de un jugador.
 * @param array $coleccionDeJuegos
 * @param STRING $jugador
 * @return INT
 */
function indicePrimerJuegoGanado($coleccionDeJuegos, $jugador){    
    $indiceFinal = 0;
    for ($i = 0; $i < count($coleccionDeJuegos); $i++) {
        $juego = $coleccionDeJuegos[$i];
        if ($juego["jugador1"] == $jugador && $juego["aciertos1"] > $juego["aciertos2"]){
            return $i;
        }
        if ($juego["jugador2"] == $jugador && $juego["aciertos2"] > $juego["aciertos1"]) {
            return $i;
        }
    }    
    return -1;    
}           
    
        


/** muestra en pantalla  un resumen de un jugador.
 * @param array $coleccionDeJuegos
 * @param STRING $jugador
 */
function resumenDelJugador($coleccionDeJuegos, $jugador){
    // array $resumenDeJugador, $juego
    // int $acumjuegosEmpatados, $acumAciertos, $acumJuegosGanados, $acumJuegosPerdidos

    // inicio el arreglo con la claves nombradas
    $resumenDeJugador = [];
    $resumenDeJugador =  ["nombre" => " ", "juegosGanados" => 0, "juegosPerdidos" => 0, "juegosEmpatados" => 0, "aciertosAcumulados" => 0];
    $acumjuegosEmpatados = 0;
    $acumAciertos = 0;
    $acumJuegosGanados = 0;
    $acumJuegosPerdidos = 0;

    //
    for ($i = 0; $i < count($coleccionDeJuegos); $i++){
        $juego = $coleccionDeJuegos[$i];

        if($juego["jugador1"] == $jugador || $juego["jugador2"] == $jugador){
            if ($juego["aciertos1"] == $juego["aciertos2"]){
                $acumjuegosEmpatados = $acumjuegosEmpatados + 1;
                $acumAciertos = $acumAciertos + 2;
            } 
            elseif($juego["aciertos1"] > $juego["aciertos2"]){
                // aca esta la rama donde gano el jugador 1
                if ($juego["jugador1"] == $jugador){
                $acumJuegosGanados = $acumJuegosGanados + 1;
                $acumAciertos = $acumAciertos + 3;
                }
                else{
                $acumJuegosPerdidos = $acumJuegosPerdidos + 1;
                $acumAciertos = $acumAciertos + 1;
                }                
            }
            elseif($juego["aciertos1"] < $juego["aciertos2"]){
                // aca esta la rama donde gano el jugador 2
                if ($juego["jugador2"] == $jugador){
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
}
/** Retorna el total de juegos ganados.
 *  @param array $coleccionDeJuegos
 *  @return INT
 *  */    
function juegosGanados($coleccionDeJuegos){
    // array $juego
    // INT $acumJuegosGanados
    $acumJuegosGanados = 0;

    for ($i = 0; $i < count($coleccionDeJuegos); $i++) {
        $juego = $coleccionDeJuegos[$i];   
         
        if($juego["aciertos1"] > $juego["aciertos2"]){
            // aca esta la rama donde gano el jugador 1
            $acumJuegosGanados = $acumJuegosGanados + 1;
        }
        elseif($juego["aciertos1"] < $juego["aciertos2"]){
            // aca esta la rama donde gano el jugador 2
            $acumJuegosGanados = $acumJuegosGanados + 1;
        }
        else{

        }        
    }
    return $acumJuegosGanados;
}

/** Retorna el total de juegos ganados por X jugador.
 * @param array $coleccionDeJuegos
 * @param int $numeroJugador
 * @return INT
 */
function numeroJugadorJuegosGanados($coleccionDeJuegos, $numeroJugador){
    // array $juego
    // int $acumJuegosGanadosJugadorX
    $acumJuegosGanadosJugadorX = 0;

    if ($numeroJugador == 1){
        for ($i = 0; $i < count($coleccionDeJuegos); $i++) {
            $juego = $coleccionDeJuegos[$i]; 
            if($juego["aciertos1"] > $juego["aciertos2"]){
                // aca esta la rama donde gano el jugador 1
                $acumJuegosGanadosJugadorX = $acumJuegosGanadosJugadorX + 1;
            }
        }
    }    
    elseif ($numeroJugador == 2){
        for ($i = 0; $i < count($coleccionDeJuegos); $i++) {
            $juego = $coleccionDeJuegos[$i];   
            if($juego["aciertos1"] < $juego["aciertos2"]){
                // aca esta la rama donde gano el jugador 2
                $acumJuegosGanadosJugadorX = $acumJuegosGanadosJugadorX + 1;
            }         
        }
    }
    return $acumJuegosGanadosJugadorX;
}

/** funcion comparadora para el uasort
 * @param array $juegoA
 * @param array $juegoB
 * @return INT
 */
function compararPorJugador2($juegoA, $juegoB) {
    return $juegoA["jugador2"] <=> $juegoB["jugador2"];
}
/** Uasort papu
 * @param array $coleccionDeJuegos
 */
function deboUsarUasort($coleccionDeJuegos){
    uasort($coleccionDeJuegos, "compararPorJugador2");
    print_r($coleccionDeJuegos);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:

$coleccionDeJuegos = [];
$coleccionDeJuegos = cargarJuegos();

$juego = [];
$juego = ["jugador1" => " ",
          "aciertos1" => 0,
          "jugador2" => " ",
          "aciertos2" => 0];
          
$indice = 0;
$jugador = " ";


// inicio el arreglo con la claves nombradas
$resumenDeJugador = [];
$resumenDeJugador =  ["nombre" => " ",
                     "juegosGanados" => 0,
                     "juegosPerdidos" => 0,
                     "juegosEmpatados" => 0,
                     "aciertosAcumulados" => 0];

//Proceso:



do {
    $opcion = seleccionarOpcion();

    
    switch ($opcion) {
        case 1: 
            //[1]Jugar a memoria.
            $juego = jugarMemoria();
            $coleccionDeJuegos = agregarJuego($coleccionDeJuegos,$juego);

            break;

        case 2: 
            //[2]Mostrar un Juego.
            //int $indice
            $min = 1;
            $max = count($coleccionDeJuegos);
            $indice = solicitarNumero($min, $max);
            datosDeJuego($coleccionDeJuegos, $indice );

            break;

        case 3: 
            //[3]Mostrar el primer juego ganador.
            // me meto a un ciclo do/while para obtener un nonmbre de jugador valido.
            do{    
                echo "ingresar el nombre del jugador que quiere ver el primer juego ganado: ";
                //para evitar errores, uso el mismo criterio de memoria.php para guardar el nombre del jugador.
                $jugador=ucfirst(strtolower(trim(fgets(STDIN))));        
                $encontrado = false;

                for ($i = 0; $i < count($coleccionDeJuegos); $i++){
                    $juego = $coleccionDeJuegos[$i];
                    if ($juego["jugador1"] == $jugador || $juego["jugador2"] == $jugador){
                        $encontrado = true;
                    } 
                }    
                
                if ($encontrado) {
                echo "$jugador se encuentra en la colección de juegos.\n";
                } 
                else {
                echo "$jugador NO se encuentra en la colección de juegos.\n";
                }
            } while (!$encontrado);

            $indice = indicePrimerJuegoGanado($coleccionDeJuegos, $jugador);
            
            if ($indice == -1){
                echo "El jugador $jugador no ganó ningún juego";
            }
            else{
                //en datosDejuego, el indice tiene un -1 para ser util en otra funcion.
                $indice = $indice + 1;   
                datosDeJuego($coleccionDeJuegos, $indice);
            }
            break;
        
        case 4: 
            //[4]Mostrar porcentaje de Juegos ganados.
            $juegosEmpatados = 0;
            $juegosGanados = 0;
            $juegosGanados= 0;
            
            echo "4 elegiste una opcion :) \n";
            $min = 1;
            $max = 2;
            $jugador= solicitarNumero($min, $max);
            $juegosGanados = juegosGanados($coleccionDeJuegos);
            $juegosJugados = count($coleccionDeJuegos);
            $juegosEmpatados = $juegosJugados - $juegosGanados;

            echo "En total se jugaron ".$juegosJugados." juegos de memoria, de los cuales ".$juegosEmpatados." son empates y ".$juegosGanados." son juegos ganados ";
            echo "(29 son ganados por jugador 1 y 11 son ganados por jugador 2). ";

            break;

        case 5: 
            //[5]Mostrar resumen de Jugador.
            
            do{    
                echo "ingresar el nombre del jugador que quiere ver el resumen: ";
                //para evitar errores, uso el mismo criterio de memoria.php para guardar el nombre del jugador.
                $jugador=ucfirst(strtolower(trim(fgets(STDIN))));        
                $encontrado = false;

                for ($i = 0; $i < count($coleccionDeJuegos); $i++){

                    $juego = $coleccionDeJuegos[$i];
                    if ($juego["jugador1"] == $jugador || $juego["jugador2"] == $jugador){
                        $encontrado = true;
                    } 
                }    
                
                if ($encontrado) {
                echo "$jugador se encuentra en la colección de juegos.\n";
                } 
                else {
                echo "$jugador NO se encuentra en la colección de juegos.\n";
                }
            } while (!$encontrado);

            resumenDelJugador($coleccionDeJuegos, $jugador);
            break;

        case 6: 
            //[6]Mostrar listado de juegos Ordenado por jugador 2.
            echo "6 elegiste una opcion :) \n";
            deboUsarUasort($coleccionDeJuegos);
            break;
                    
        
    }
//[7]Salir.
} while ($opcion != 7); 



// Estas 3 líneas de código ejecutan el juego y muestran el arreglo retornado con los resultado
// Probar la primera vez y luego comentar/borrar
//$juego = jugarMemoria();
//echo "jugador 1 " . $juego["jugador1"] . ": " . $juego["aciertos1"] . " aciertos" . "\n";
//echo "jugador 2 " . $juego["jugador2"] . ": " . $juego["aciertos2"] . " aciertos" . "\n";

//HOlaaaa esto es un comit ahhhhh
// me gusta marathon :3
?>