<?php
session_start();
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