<?php
$lettersArray = getLettersArray();
$serializedLetters = serializeLetters($lettersArray);
$wordIndex = getWordIndex($wordsArray);
$word = getWord($wordsArray, $wordIndex);
$lettersCount = strlen($word);
$replacementString = getReplacementString($lettersCount);