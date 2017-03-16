<?php
session_start();
if (file_exists(DB_INI_FILE) || file_exists(BACKUP_FILE)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['email'])) {
            include 'controllers/postPlayerController.php';
        } else {
            include 'controllers/postGameController.php';
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include 'controllers/getGameController.php';
    } else {
        header('Location: http://cours.app/pendu-db/errors/error_405.php');
        exit;
    }
} else {
    header('Location: http://cours.app/pendu-db/errors/error_main.php');
    exit;
}
