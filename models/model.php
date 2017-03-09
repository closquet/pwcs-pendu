<?php
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

function getSerializedLetters($someArrayToSerialize)
{
    return serialize($someArrayToSerialize);
}

function getUnserializedLetters($somethingToUnserialize)
{
    return unserialize($somethingToUnserialize);
}

function getWordsArray()
{
    return @file(SOURCE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: false;
}

function getRandomIndex($someArray)
{
    return rand(0, count($someArray) - 1);
}

function getWordOfDb()
{
    $pdo = connectDb();
    $sql = 'SELECT word FROM words ORDER BY RAND() LIMIT 1';
    $statement = $pdo->query($sql);
    if ($statement){
        return strtolower($statement->fetchColumn());
    }
}

function getWord($wordsArray, $wordIndex)
{
    $wordOfDb = getWordOfDb();
    if ($wordOfDb){
        echo $wordOfDb . ' de la base de donnée';
        return $wordOfDb;
    }
    echo (str_replace(' ', '', strtolower($wordsArray[$wordIndex]))) . ' du fichier';
    return str_replace(' ', '', strtolower($wordsArray[$wordIndex]));
}

function getReplacementString($count)
{
    return str_pad('', $count, REPLACEMENT_CHAR);
}

function testLetter($word, $letter)
{
    return strpos($word, $letter);
}

function connectDb()
{
    $connectInfo = parse_ini_file(SOURCE_DB);
    $dsn = sprintf('mysql:host=%s;dbname=%s', $connectInfo['HOST'], $connectInfo['DB_NAME']);
    try {
        return new PDO($dsn, $connectInfo['USER'], $connectInfo['PASS']);
    } catch (PDOException $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

