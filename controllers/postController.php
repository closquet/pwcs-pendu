<?php
$serializedLetters = $_POST['serializedLetters'];
$triedLetter = $_POST['triedLetter'];
$triedLetters = $_POST['triedLetters'];
$wordIndex = $_POST['wordIndex'];
$lettersCount = $_POST['lettersCount'];
$replacementString = $_POST['replacementString'];
$trials = $_POST['trials'];
$word = getWord($wordsArray, $wordIndex);
$lettersArray = unserializeLetters($serializedLetters);
$lettersArray[$triedLetter] = false;
$serializedLetters = serializeLetters($lettersArray);
$triedLetters .= $triedLetter;
$letterFound = false;

for ($i = 0; $i < $lettersCount; $i++) {
    if (substr($word, $i, 1) === $triedLetter) {
        $letterFound = true;
        $replacementString = substr_replace($replacementString, $triedLetter, $i, 1);
    }
}
if ($word === $replacementString) {
    $wordFound = 1;
} else {
    if (!$letterFound) {
        $trials += 1;
    }
    $remainingTrials = MAX_TRIALS - $trials;
}
