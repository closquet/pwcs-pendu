<?php    
/**
 * $wordFound est un indicateur booléen du fait que le mot a été trouvé ou pas
 * @var boolean
 */
$wordFound = false;

/**
 * Le nombre d’essais infructueux déjà fait
 * @var integer
 */
$trials = intval($_COOKIE['trials']);

/**
 * Une chaîne qui représente le tableau des lettres
 * @var string
 */
$serializedLetters = $_COOKIE['serializedLetters'];

/**
 * Un tableau des lettres utilisables pour faire le select
 * @var array
 */
$lettersArray = getUnserializedLetters($serializedLetters);

/**
 * La position du mot à trouver dans le tableau
 * @var int
 */
$wordIndex = intval($_COOKIE['wordIndex']);

/**
 * Le mot à trouver
 * @var string
 */
$word = getWord($wordsArray, $wordIndex);

/**
 * le nombre de lettres du mot
 * @var int
 */
$lettersCount = strlen($word);

/**
 * La chaîne fantôme qui masque les lettres du mot avec un caractère de remplacement
 * @var string
 */
$replacementString = $_COOKIE['replacementString'];

/**
 * Les lettres déjà essayées
 * @var string
 */
$triedLetters = $_COOKIE['triedLetters'];

/**
 * La lettre qui vient d’être essayée
 * @var string
 */
$triedLetter = $_POST['triedLetter'];

if ($triedLetters == '0'){
    $triedLetters = '';
}
$triedLetters .= $triedLetter; // Modification de la chaîne des lettres déjà essayées en y ajoutant la nouvelle essayée par le joueur
$lettersArray[$triedLetter] = false; // Modification du statut de la lettre qui vient d’être essayée. Son statut est mis à false dans le tableau $lettersArray
$serializedLetters = getSerializedLetters($lettersArray); // Transformation du tableau des lettres en une chaine qui le représente


$letterFound = false;
$letterFound = testLetter($word, $triedLetter);
if ($letterFound === false){
    $trials++;
}else{
    foreach (str_split($word) as $index => $letter){
        if ($letter == $triedLetter){
            $replacementString[$index] = $letter;
            setcookie('replacementString', $replacementString);
            if ($word == $replacementString){
                $wordFound = true;
            }
        }
    }
}
$remainingTrials = MAX_TRIALS - $trials;
setcookie('serializedLetters', $serializedLetters);
setcookie('trials', $trials);
setcookie('triedLetters', $triedLetters);