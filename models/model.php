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

function getWordFromFile()
{
    $wordsArray
        = @file(BACKUP_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
    if ($wordsArray) {
        return strtolower($wordsArray[rand(0, count($wordsArray) - 1)]);
    } else {
        header('Location: http://cours.app/pendu-db/errors/error_main.php');
        exit;
    }
}

function getWord()
{
    $pdo = connectDB();
    if ($pdo) {
        $sql = 'SELECT word FROM pendu.words ORDER BY RAND()';
        try {
            $pdoSt = $pdo->query($sql);
            return strtolower($pdoSt->fetchColumn());
        } catch (PDOException $e) {
            return getWordFromFile();
        }
    } else {
        return getWordFromFile();
    }
}

function connectDB()
{
    $dbConfig = @parse_ini_file(DB_INI_FILE);
    $dsn = sprintf(
        'mysql:dbname=%s;host=%s',
        $dbConfig['DB_NAME'],
        $dbConfig['DB_HOST']
    );
    try {
        return new PDO(
            $dsn,
            $dbConfig['DB_USER'],
            $dbConfig['DB_PASS'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]
        );
    } catch (PDOException $e) {
        return false;
    }
}

function getReplacementString($lettersCount)
{
    return str_pad('', $lettersCount, REPLACEMENT_CHAR);
}

function initGame()
{
    $_SESSION['wordFound'] = false;
    $_SESSION['remainingTrials'] = MAX_TRIALS;
    $_SESSION['trials'] = 0;
    $_SESSION['triedLetters'] = '';
    $_SESSION['lettersArray'] = getLettersArray();
    $_SESSION['word'] = getWord();
    $_SESSION['lettersCount'] = strlen($_SESSION['word']);
    $_SESSION['replacementString'] = getReplacementString($_SESSION['lettersCount']);
    $_SESSION['attempts'] = 0;
}

function saveGame()
{
    $pdo = connectDB();
    if ($pdo) {
        $sql = 'INSERT INTO pendu.games(`username`,`trials`,`word`,`attempts`) VALUES (:email,:trials,:word,:attempts)';
        try {
            $pdoSt = $pdo->prepare($sql);
            $pdoSt->execute([
                ':email' => $_SESSION['email'],
                ':trials' => $_SESSION['trials'],
                ':word' => $_SESSION['word'],
                ':attempts' => $_SESSION['attempts']
            ]);
        } catch (PDOException $e) {
            die('Quelque chose a posé problème lors de l’enregistrement');
        }
    } else {
        die('Quelque chose a posé problème lors de l’enregistrement');
    }
}

function getGamesCountForCurrentPlayer()
{
    $pdo = connectDB();
    if ($pdo) {
        $sql = sprintf('SELECT COUNT(*) FROM pendu.games WHERE username = \'%s\'', $_SESSION['email']);
        try {
            $pdoSt = $pdo->query($sql);
            return $pdoSt->fetchColumn();
        } catch (PDOException $e) {
            return '';
        }
    } else {
        die('Quelque chose a posé problème lors de la récupération du nombre de parties');
    }
}

function getGamesWonForCurrentPlayer()
{
    $pdo = connectDB();
    if ($pdo) {
        $sql = sprintf(
            'SELECT COUNT(*) FROM pendu.games WHERE username = \'%s\' AND trials < \'%s\'',
            $_SESSION['email'],
            MAX_TRIALS
        );
        try {
            $pdoSt = $pdo->query($sql);
            return $pdoSt->fetchColumn();
        } catch (PDOException $e) {
            return '';
        }
    } else {
        die('Quelque chose a posé problème lors de la récupération du nombre de parties gagnées');
    }
}
