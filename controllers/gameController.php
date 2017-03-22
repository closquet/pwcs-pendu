<?php
function init()
{
    $_SESSION['email'] = $_SESSION['email']??'';

    return ['view' => 'views/player.php'];
}

function play()
{

    if (is_letter($_POST['triedLetter'])) {
        include 'models/gameModel.php';
        include 'models/playerModel.php';
        increaseAttempt();
        $triedLetter = $_POST['triedLetter'];
    } else {
        header('Location: http://cours.app/pendu/errors/error_main.php');
        exit;
    }

    updateTriedLettersString($triedLetter);
    updateLettersArray($triedLetter);

    if (!is_letterInWord($triedLetter)) {
        increaseTrials();
    } else {
        $_SESSION['wordFound'] = is_wordFound();
    }

    updateRemainingTrials();

    $gamesCount = $gamesWon = '';
    if ($_SESSION['email']) {
        if ($_SESSION['wordFound'] || !$_SESSION['remainingTrials']) {
            saveGame();
            $gamesCount = getGamesCount();
            if ($gamesCount) {
                $gamesWon = getGamesWon();
            }
        }
    }

    $view = 'views/game.php';

    return compact('view', 'gamesCount', 'gamesWon');
}
