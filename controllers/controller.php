<?php
if($wordsArray = getWordsArray()){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        include('controllers/getController.php');
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
        include('controllers/postController.php');
    }else{
        $error = '<p>Cette méthode HTTP n’est pas utilisée</p>';
    }
}else{
    $error = '<p>Ooops, un problème est survenu lors de la récupération des mots</p>';
}
