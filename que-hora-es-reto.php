<?php

/* int h, m, s;
cin >> h >> m >> s;
cout << (h*60*60) + (m*60) + s;
return 0; */

$horas = readline("Ingresa la cantidad de horas: ");
$minutos = readline("Ingresa la cantidad de minutos: ");
$segundos = readline("Ingresa la cantidad de segundos: ");

$tiempo_en_segundos = ($horas * 60 * 60) + ($minutos * 60) + $segundos;

echo "Esto equivale a $tiempo_en_segundos segundos.\n";