<?php

$segundos = readline("Ingresa el tiempo en segundos: ");

$hora = (int) ($segundos / 3600);
$segundos = (int) ($segundos % 3600);
$minutos = (int) ($segundos / 60);
$segundos = (int) ($segundos % 60);

echo "Son $hora horas, $minutos minutos y $segundos segundos.\n";

// Los módulos nos ayudan a eliminar los segundos que ya ocupamos y dejar los segundos restantes, por ejemplo 3661 % 3600 = 61. Al igual que 7261 % 3600 = 61. La operación de módulo ayuda a eliminar bloques de 3600 y nos devuelve el restante. Como ya sabemos que no habran más hora entonces repetimos el mismop proceso con los minutos, y pues lo que reste del módulo de los minutos ya son segundos directamente.