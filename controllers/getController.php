<?php
$wordFound = false;

$remainingTrials = MAX_TRIALS;

$trials = 0;
$_SESSION['trials'] = $trials;

$triedLetters = '0';
$_SESSION['triedLetters'] = $triedLetters;

$lettersArray = getLettersArray();
$_SESSION['lettersArray'] = $lettersArray;

$wordIndex = getRandomIndex($wordsArray);
$_SESSION['wordIndex'] = $wordIndex;

$word = getWord($wordsArray, $wordIndex);

$lettersCount = strlen($word);

$replacementString = getReplacementString($lettersCount);
$_SESSION['replacementString'] = $replacementString;

