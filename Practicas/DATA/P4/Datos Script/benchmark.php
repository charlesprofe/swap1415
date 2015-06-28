<?php

/*
 * Autor: Pedro A. Castillo
 */

$tiempo_inicio = microtime(true);

for ($i=0; $i<3000000; $i++){
 $a = $i * $i;
 $b = $a - $i;
 $c = $a / ($b+1);
 $d = 1 / ($c+1);
}

$tiempo_fin = microtime(true);

echo "Tiempo empleado: " . round($tiempo_fin - $tiempo_inicio, 4) ; 

?>
