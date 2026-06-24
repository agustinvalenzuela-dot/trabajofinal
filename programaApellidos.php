<?php
include_once("memoria.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/** Monsalve, Axel. FAI-6073. Tecnicatura Universitaria en Administración de Sistemas y Software Libre
 *  mail : axel.monsalve@est.fi.uncoma.edu.ar
 *  Usuario Github : no posee.
 * 
 *  Valenzuela, Agustin. FAI-6199. Tecnicatura Universitaria en Administración de Sistemas y Software Libre
 *  mail : agustin.valenzuela@est.fi.uncoma.edu.ar
 *  Usuario Github : no posee.
 */ 

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** 
 * Arreglo con ejemplos de juegos.
 * @return array 
 */
function cargarJuegos(){
    //array $coleccionDeJuegos

    $coleccionDeJuegos = [];
    $coleccionDeJuegos[0] = ["jugador1" => "Max", "aciertos1" => 3, "jugador2" => "Mona", "aciertos2" => 1];
    $coleccionDeJuegos[1] = ["jugador1" => "Michael", "aciertos1" => 1, "jugador2" => "Trevor", "aciertos2" => 3];
    $coleccionDeJuegos[2] = ["jugador1" => "Daigo", "aciertos1" => 2, "jugador2" => "Justin", "aciertos2" => 2];
    $coleccionDeJuegos[3] = ["jugador1" => "Guile", "aciertos1" => 3, "jugador2" => "Ingrid", "aciertos2" => 1];
    $coleccionDeJuegos[4] = ["jugador1" => "Max", "aciertos1" => 1, "jugador2" => "Michael", "aciertos2" => 3];
    $coleccionDeJuegos[5] = ["jugador1" => "Trevor", "aciertos1" => 2, "jugador2" => "Zangief", "aciertos2" => 2];
    $coleccionDeJuegos[6] = ["jugador1" => "Mona", "aciertos1" => 0, "jugador2" => "Justin", "aciertos2" => 4];
    $coleccionDeJuegos[7] = ["jugador1" => "Ingrid", "aciertos1" => 1, "jugador2" => "Guile", "aciertos2" => 3];
    $coleccionDeJuegos[8] = ["jugador1" => "Zangief", "aciertos1" => 3, "jugador2" => "Max", "aciertos2" => 1];
    $coleccionDeJuegos[9] = ["jugador1" => "Gye", "aciertos1" => 2, "jugador2" => "Daven", "aciertos2" => 2];

    return $coleccionDeJuegos;
}

/** 
 * Solicitar al usuario un número dentro de un rango válido.
 * Repite la solicitud hasta recibir un valor correcto.
 *
 * @param int $min  Valor mínimo 
 * @param int $max  Valor máximo 
 * @return int      Número válido ingresado por el usuario 
 */
function solicitarNumero($min, $max){
    //int $entrada
   
    $entrada = 0;
    echo "Ingrese un número entre $min y $max: ";
    $entrada = solicitarNumeroEntre($min, $max);
    
    return $entrada;     
}

/** 
 * Mostrar en pantalla el menu y devolver la opcion que elige el usuario.
 * @return INT 
 */
function seleccionarOpcion(){
    // int $opcion, $min, $max

    echo "\n===== MENÚ PRINCIPAL =====\n";
    echo "[1]Jugar a memoria.\n";
    echo "[2]Mostrar un Juego.\n";
    echo "[3]Mostrar el primer juego ganador.\n";
    echo "[4]Mostrar porcentaje de Juegos ganados.\n";
    echo "[5]Mostrar resumen de Jugador.\n";
    echo "[6]Mostrar listado de juegos Ordenado por jugador 2.\n";
    echo "[7]Salir.\n";
    
    $opcion = 0;
    $min = 1;
    $max = 7;
    $opcion = solicitarNumero($min, $max);

   return $opcion;
}

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

/** 
 * Agregar un nuevo juego al arreglo coleccion de juegos.
 * @param array $coleccionDeJuegos
 * @param array $juego
 * @return array
 */
function agregarJuego($coleccionDeJuegos, $juego) {
    // array $coleccionDeJuegos
    
    //utilizar array push enves de este metodo :p
    $coleccionDeJuegos[] = $juego; //al parecer asi se agrega una nueva entrada al arreglo xd
    
    return $coleccionDeJuegos;
}    

/** 
 * Obtener el indice del primer juego ganado de un jugador.
 * @param array $coleccionDeJuegos
 * @param STRING $jugador
 * @return INT
 */
function indicePrimerJuegoGanado($coleccionDeJuegos, $jugador){    
    // array $juego


    for ($i = 0; $i < count($coleccionDeJuegos); $i++) {
        $juego = $coleccionDeJuegos[$i];
        
        // verifica si nuestro jugador es jugador 1 y ganó el juego.
        if ($juego["jugador1"] == $jugador && $juego["aciertos1"] > $juego["aciertos2"]){
            return $i;
        }
        // verifica si nuestro jugador es jugador 2 y ganó el juego.
        if ($juego["jugador2"] == $jugador && $juego["aciertos2"] > $juego["aciertos1"]) {
            return $i;
        }
    }    
    return -1;    
}           
    
/** 
 * Muestra en pantalla  un resumen de un jugador.
 * @param array $coleccionDeJuegos
 * @param STRING $jugador
 */
function resumenDelJugador($coleccionDeJuegos, $jugador){
    // array $resumenDeJugador, $juego
    // int $acumjuegosEmpatados, $acumAciertos, $acumJuegosGanados, $acumJuegosPerdidos

    // inicio el arreglo asociativo $resumenDeJugador y nombro sus claves
    //$resumenDeJugador = [];
    //$resumenDeJugador =  ["nombre" => " ", "juegosGanados" => 0, "juegosPerdidos" => 0, "juegosEmpatados" => 0, "aciertosAcumulados" => 0];
    $acumjuegosEmpatados = 0;
    $acumAciertos = 0;
    $acumJuegosGanados = 0;
    $acumJuegosPerdidos = 0;

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
      
    //guardo los valores de mis variables en $resumenDeJugador 
    //$resumenDeJugador["nombre"] = "$jugador";
    //$resumenDeJugador["juegosGanados"] = $acumJuegosGanados;
    //$resumenDeJugador["juegosPerdidos"] = $acumJuegosPerdidos;
    //$resumenDeJugador["juegosEmpatados"] = $acumjuegosEmpatados;
    //$resumenDeJugador["aciertosAcumulados"] = $acumAciertos;

    echo "**************************************\n";
    echo "Jugador: $jugador\n";
    echo "Ganó: ".$acumJuegosGanados." juegos\n";
    echo "Perdió: ".$acumJuegosPerdidos." juegos\n";
    echo "Empató: ".$acumjuegosEmpatados." juegos\n";
    echo "Total de aciertos acumulados: ".$acumAciertos." aciertos\n";    
    echo "**************************************\n";                       
}
/** 
 * Retorna el total de juegos ganados.
 * @param array $coleccionDeJuegos
 * @return INT
 */    
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

/** 
 * Retorna el total de juegos ganados por X jugador.
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

/** 
 * Función comparadora para el uasort.
 * @param array $juegoA
 * @param array $juegoB
 * @return INT 
 */
function compararPorJugador2($juegoA, $juegoB) {
    
    return $juegoA["jugador2"] <=> $juegoB["jugador2"];

}
/** 
 * La función Uasort.
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
// int $indice $opcion $min $max $totalJuegosGanados $juegosGanadosPorJugador1 $juegosGanadosPorJugador2
// float $porcentaje
// array $coleccionDeJuegos $juego
// string $jugador
// bool $encontrado

//Inicialización de variables:

$coleccionDeJuegos = [];
$coleccionDeJuegos = cargarJuegos();
$juego = [];
//$juego = ["jugador1" => " ", "aciertos1" => 0, "jugador2" => " ", "aciertos2" => 0];
$indice = 0;
$jugador = " ";
$encontrado = false;
$totalJuegosGanados = 0;
$juegosGanadosPorJugador1 = 0;
$porcentaje = 0;

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
            
            $min = 1;
            $max = count($coleccionDeJuegos);
            $indice = solicitarNumero($min, $max);
            datosDeJuego($coleccionDeJuegos, $indice);

            break;

        case 3: 
            //[3]Mostrar el primer juego ganador.
            // me meto a un ciclo do/while para obtener un nonmbre de jugador valido.
            do{    
                echo "ingresar el nombre del jugador que quiere ver el primer juego ganado: ";
                //para evitar errores, uso el mismo criterio de memoria.php para guardar el nombre del jugador.
                $jugador=ucfirst(strtolower(trim(fgets(STDIN))));        

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
                //La función datosDeJuego esta escrita con un $indice - 1 para facilitar el case anterior. Es por eso que en la siguiente linea le sumamos 1.
                $indice = $indice + 1;   
                datosDeJuego($coleccionDeJuegos, $indice);
            }
            break;
        
        case 4: 
            //[4]Mostrar porcentaje de Juegos ganados.
            
            $totalJuegosGanados =  juegosGanados($coleccionDeJuegos);   
            
            $min = 1;
            $max = 2;
            $jugador= solicitarNumero($min, $max);
            echo "el numero de jugador que ha seleccionado es: ".$jugador."\n";
              if ($jugador == 1){
                    $juegosGanadosPorJugador1 = numeroJugadorJuegosGanados($coleccionDeJuegos, $jugador);
                    $porcentaje = ($juegosGanadosPorJugador1 * 100)/ $totalJuegosGanados; 
                    echo "el jugador ".$jugador." gano el ".$porcentaje." de los juegos ganados \n";
              }
              else{
                    $juegosGanadosPorJugador2 = numeroJugadorJuegosGanados($coleccionDeJuegos, $jugador);
                    $porcentaje = ($juegosGanadosPorJugador2 * 100)/ $totalJuegosGanados; 
                    echo "el jugador ".$jugador." gano el ".$porcentaje." de los juegos ganados \n";
               }
            
            
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

            deboUsarUasort($coleccionDeJuegos);
            break;
    }
//[7]Salir.
} while ($opcion != 7); 

?>
