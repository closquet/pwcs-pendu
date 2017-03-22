<?php
function getGamesCount()
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
        die('Quelque chose a posé problème lors de l’enregistrement');
    }
}

function getGamesWon()
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
        die('Quelque chose a posé problème lors de l’enregistrement');
    }
}

function is_validEmail($userInput)
{
    return filter_var($userInput, FILTER_VALIDATE_EMAIL);
}
