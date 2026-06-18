<?php

function pedirNumeroEnRango($min, $max){
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


$min =1;
$max =2;

$indice = pedirNumeroEnRango($min, $max);
echo $indice."\n";
