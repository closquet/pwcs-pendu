<?php
$wordFound = false;

$remainingTrials = MAX_TRIALS;

$trials = 0;
$_SESSION['trials'] = $trials;

$triedLetters = '';
$_SESSION['triedLetters'] = $triedLetters;

$lettersArray = getLettersArray();
$_SESSION['lettersArray'] = $lettersArray;

$wordIndex = getRandomIndex($wordsArray);

$word = getWord($wordsArray, $wordIndex);
$_SESSION['word'] = $word;

$lettersCount = strlen($word);

$replacementString = getReplacementString($lettersCount);
$_SESSION['replacementString'] = $replacementString;

