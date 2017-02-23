<?php

if ($wordsArray = getWordsArry()) {
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        include('controllers/postController.php');
    }elseif ($_SERVER['REQUEST_METHOD']==='GET') {
        include('controllers/getController.php');
    }else {
        die('Houla ! Qu\'est-ce que tu fais avec cette méthode http ?');
    }
}else {
    die('Houla ! on ne trouve pas le fichier.');
}
