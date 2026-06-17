<?php
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

   echo "$opcion.\n";
