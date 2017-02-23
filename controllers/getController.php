<?php
/**
 * $wordFound est un indicateur booléen du fait que le mot a été trouvé ou pas
 * @var boolean
 */
$wordFound = false;

/**
 * Le nombre d’essais qui reste au joueur pour trouver le mot. 
 * @var integer
 */
$remainingTrials = MAX_TRIALS;

/**
 * Le nombre d’essais infructueux déjà fait
 * @var integer
 */
$trials = 0;

/**
 * Les lettres déjà essayées
 * @var string
 */
$triedLetters = '';

/**
 * Un tableau des lettres utilisables pour faire le select
 * @var array
 */
$lettersArray = getLettersArray();

/**
 * Une chaîne qui représente le tableau des lettres
 * @var string
 */
$serializedLetters = getSerializedLetters($lettersArray);

/**
 * La position du mot à trouver dans le tableau
 * @var integer
 */
$wordIndex = getRandomIndex($wordsArray);

/**
 * Le mot à trouver
 * @var string
 */
$word = getWord($wordsArray, $wordIndex);

/**
 * le nombre de lettres du mot
 * @var integer
 */
$lettersCount = strlen($word);

/**
 * La chaîne fantôme qui masque les lettres du mot avec un caractère de remplacement
 * @var string
 */
$replacementString = getReplacementString($lettersCount);
