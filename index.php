<?php
function clear() {

    if (PHP_OS === "WINNT")
        system("cls");
    else
        system("clear");

}

$possible_words = ["Bebida", "Prisma", "Ala", "Dolor", "Piloto", "Baldosa", "Terremoto", "Asteroide", "Gallo", "Platzi"];
define("MAX_ATTEMPTS", 6);


echo "😼 ¡Jueguemos al ahorcado! \n\n";

// Inicializamos el juego
$choosen_word = $possible_words[ rand(0, 9) ];
$choosen_word = strtolower($choosen_word);
$word_length = strlen($choosen_word);
$discovered_letters = str_pad("", $word_length, "_");
$attempts = 0;

do {

    // Damos la bienvenida al jugador
    echo "Palabra de $word_length letras: \n\n";
    echo $discovered_letters;
    echo "\n\n";

    // Pedimos que escriba
    $player_letter = readline("Escribe una letra: ");
    $player_letter = strtolower($player_letter);

    // Empezamos a validar
    if ( str_contains($choosen_word, $player_letter) ) {
        
        // Verificamos todas las ocurrencias de esta letra para reemplazarla
        $offset = 0;
        while ( ( $letter_position = strpos($choosen_word, $player_letter, $offset) ) !== false ) {

            $discovered_letters[$letter_position] = $player_letter;
            $offset = $letter_position + 1;

        }

    }
    else {

        // Informamos que esta letra no fue la correcta
        clear();
        $attempts++;
        echo "Letra incorrecta 😾. Te quedan " . (MAX_ATTEMPTS - $attempts) . " intentos.";
        sleep(2);

    }

    clear();

} while($attempts < MAX_ATTEMPTS && $discovered_letters != $choosen_word);

clear();

if ($attempts < MAX_ATTEMPTS) 
    echo "¡Felicidades! Has adivinado la palabra. 😸 \n\n";
else
    echo "Suerte para la próxima, amigo. 😿 \n\n";

echo "La palabra es: $choosen_word\n";
echo "Tú descubriste: $discovered_letters";

echo "\n";

// Ideas a mejorar (retos): Que al termianr el juego ganado diga cuantos intentos le quedó. 

