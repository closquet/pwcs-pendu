<?php    
$wordFound = false;

$trials = intval($_SESSION['trials']);

$lettersArray = $_SESSION['lettersArray'];

$word = $_SESSION['word'];

$lettersCount = strlen($word);

$replacementString = $_SESSION['replacementString'];

$triedLetters = $_SESSION['triedLetters'];

$triedLetter = $_POST['triedLetter'];

$triedLetters .= $triedLetter; // Modification de la chaîne des lettres déjà essayées en y ajoutant la nouvelle essayée par le joueur
$lettersArray[$triedLetter] = false; // Modification du statut de la lettre qui vient d’être essayée. Son statut est mis à false dans le tableau $lettersArray

$letterFound = false;
$letterFound = testLetter($word, $triedLetter);
if ($letterFound === false){
    $trials++;
}else{
    foreach (str_split($word) as $index => $letter){
        if ($letter == $triedLetter){
            $replacementString[$index] = $letter;
            $_SESSION['replacementString'] = $replacementString;
            if ($word == $replacementString){
                $wordFound = true;
            }
        }
    }
}
$remainingTrials = MAX_TRIALS - $trials;
$_SESSION['lettersArray'] = $lettersArray;
$_SESSION['trials'] = $trials;
$_SESSION['triedLetters'] = $triedLetters;