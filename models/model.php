<?php
/**
 * retourne le tableau des lettres disponibles pour jouer au pendu 
 * avec leur statut, disponible ou pas pour constituer le select
 * qui permettra au joueur de proposer une lettre.
 * @return array
 */
function getLettersArray()
{
    return [
        'a' => true,
        'b' => true,
        'c' => true,
        'd' => true,
        'e' => true,
        'f' => true,
        'g' => true,
        'h' => true,
        'i' => true,
        'j' => true,
        'k' => true,
        'l' => true,
        'm' => true,
        'n' => true,
        'o' => true,
        'p' => true,
        'q' => true,
        'r' => true,
        's' => true,
        't' => true,
        'u' => true,
        'v' => true,
        'w' => true,
        'x' => true,
        'y' => true,
        'z' => true,
    ];
}

/**
 * retourne une représentation d’un array sous forme d’une chaîne
 * @param  array
 * @return string
 */
function getSerializedLetters($someArrayToSerialize)
{
    return urlencode(serialize($someArrayToSerialize));
}

/**
 * retourne un array à partir de sa représentation sous forme de chaîne
 * @param  string
 * @return array
 */
function getUnserializedLetters($somethingToUnserialize)
{
    return unserialize(urldecode($somethingToUnserialize));
}

/**
 * retourne l’array des mots depuis le fichier qui en contient la liste
 * @return array
 */
function getWordsArray()
{
    return @file(SOURCE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: false;
}

/**
 * @param  array
 * @return integer
 */
function getRandomIndex($someArray)
{
    return rand(0, count($someArray) - 1);
}

/**
 * @param  array
 * @param  integer
 * @return string
 */
function getWord($wordsArray, $wordIndex)
{
    return str_replace(' ', '', strtolower($wordsArray[$wordIndex]));
}

/**
 * @param  integer
 * @return string
 */
function getReplacementString($count)
{
    return str_pad('', $count, REPLACEMENT_CHAR);
}

/**
 * @param  string
 * @return integer
 */
function testLetter($word, $letter)
{
    return strpos($word, $letter);
}