<?php

function register()
{
    include 'models/gameModel.php';
    include 'models/playerModel.php';
    $view = 'views/game.php';
    $_SESSION['errors'] = [];

    if (empty($_POST['email'])) {
        $_SESSION['email'] = '';
        initGame();
    } else {
        $_SESSION['email'] = $_POST['email'];
        if (is_validEmail($_POST['email'])) {
            initGame();
        } else {
            $_SESSION['errors'] = [
                'email' => $_POST['email'] . ' ne semble pas être une adresse email valide',
            ];
            $view = 'views/player.php';
        }
    }

    return compact('view');
}
