<?php

$lettersArray = getLettersArray();
$serializedLetters = getSerializedLetters($lettersArray);
$wordIndex = getRandomIndex($wordsArray);
$word = getWord($wordArray, $wordIndex);
