<?php
/**
* Ce fichier sert à inclure le code nécessaire à une réponse
* HTTP en GET ou en POST. Avant de faire ces inclusions, il 
* charge les mots depuis le fichier et mémorise l’Array des
* mots dans $wordsArray 
* 
*/
if ($wordsArray = getWordsArray()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('controllers/postController.php');
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include('controllers/getController.php');
    } else {
        die('Houla ! Qu’est-ce que tu fais avec cette méthode HTTP ?');
    }
}else{
    die('Houla ! On a eu un problème pour récupérer les mots dans le fichier');
}