<?php

function clear() {

    if (PHP_OS === "WINNT")
        system("cls");
    else
        system("clear");

}

function check_letters($word, $letter, $discovered_letters) {

    $offset = 0;
    while ( ( $letter_position = strpos($word, $letter, $offset) ) !== false ) {

        $discovered_letters[$letter_position] = $letter;
        $offset = $letter_position + 1;

    }

    return $discovered_letters;
    
}

function print_wrong_letter() {

    clear();
    $GLOBALS["attempts"]++;
    echo "Letra incorrecta 😾. Te quedan " . (MAX_ATTEMPTS - $GLOBALS["attempts"]) . " intentos.";
    sleep(2);

}

function print_man() {

    global $attempts;
    
    switch ($attempts) {

        case 0:
            echo "
            +---+
            |   |
                |
                |
                |
                |
            =========
            ";
            break;
           
        case 1:
            echo "
            +---+
            |   |
            O   |
                |
                |
                |
            =========
            ";
            break;

        case 2:
            echo "
            +---+
            |   |
            O   |
            |   |
                |
                |
            =========
            ";
            break;

        case 3:
            echo "
            +---+
            |   |
            O   |
           /|   |
                |
                |
            =========
            ";
            break;

        case 4:
            echo "
            +---+
            |   |
            O   |
           /|\  |
                |
                |
            =========
            ";
            break;

        case 5:
            echo "
            +---+
            |   |
            O   |
           /|\  |
           /    |
                |
            =========
            ";
            break;

        case 6:
            echo "
            Me mataste we
            +---+
            |   |
            O   |
           /|\  |
           / \  |
                |
            =========
            ";
            break;

    }

    echo "\n\n";

}

function print_game() {

    global $word_length, $discovered_letters;

    print_man();

    echo "Palabra de $word_length letras: \n\n";
    echo $discovered_letters;
    echo "\n\n";

}

function end_game() {

    global $attempts, $choosen_word, $discovered_letters;
    
    clear();

    if ($attempts < MAX_ATTEMPTS) {
        echo "¡Felicidades! Has adivinado la palabra. 😸 \n\n";
    }
    else {

        echo "Suerte para la próxima, amigo. 😿 \n\n";
        print_man();

    }

    echo "La palabra es: $choosen_word\n";
    echo "Tú descubriste: $discovered_letters";

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
    print_game();

    // Pedimos que escriba
    $player_letter = readline("Escribe una letra: ");
    $player_letter = strtolower($player_letter);

    // Empezamos a validar
    if ( str_contains($choosen_word, $player_letter) ) {
        $discovered_letters = check_letters($choosen_word, $player_letter, $discovered_letters);
    }
    else {
        print_wrong_letter();
    }

    clear();

} while($attempts < MAX_ATTEMPTS && $discovered_letters != $choosen_word);

end_game();

echo "\n";

/*

Ideas a mejorar (retos):

- Que al terminar el juego ganado diga cuantos intentos le quedó.
- Que al terminar pregunte si quiere jugar de nuevo y reinicie el juego.
- 

*/

