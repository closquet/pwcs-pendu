<?php
define('SOURCE_NAME', 'datas/words.txt');
define('MAX_TRIALS', 8);
define('REPLACEMENT_CHAR', '-');
$error = '';
$replacementString = '';
$lettersCount = 0;
$trials = 0;
$wordFound = 0;
$remainingTrials = MAX_TRIALS;
$triedLetters = '';