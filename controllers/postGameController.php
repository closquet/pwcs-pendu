<?php
$_SESSION['attempts']++;
if (ctype_alpha($_POST['triedLetter']) && strlen($_POST['triedLetter']) === 1) {
    $triedLetter = $_POST['triedLetter'];
} else {
    $triedLetter = false;
}
if (!$triedLetter) {
    header('Location: http://cours.app/pendu-db/errors/error_main.php');
    exit;
}
$_SESSION['triedLetters'] .= $triedLetter;
$_SESSION['lettersArray'][$triedLetter] = false;

$letterFound = false;
for ($i = 0; $i < $_SESSION['lettersCount']; $i++) {
    $l = substr($_SESSION['word'], $i, 1);
    if ($triedLetter === $l) {
        $letterFound = true;
        $_SESSION['replacementString'] = substr_replace($_SESSION['replacementString'], $l, $i, 1);
    }
}
if (!$letterFound) {
    $_SESSION['trials']++;
} else {
    if ($_SESSION['word'] === $_SESSION['replacementString']) {
        $_SESSION['wordFound'] = true;
    }
}
$_SESSION['remainingTrials'] = MAX_TRIALS - $_SESSION['trials'];

$gamesCount = '';
if ($_SESSION['email']) {
    if ($_SESSION['wordFound'] || !$_SESSION['remainingTrials']) {
        saveGame();
        $gamesCount = getGamesCountForCurrentPlayer();
        if ($gamesCount) {
            $gamesWon = getGamesWonForCurrentPlayer();
        }
    }
}

$view = 'views/game.php';
