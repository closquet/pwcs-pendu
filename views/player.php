<p>
    Bienvenue <?=   $_SESSION['user']; ?>
</p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="userEmail">Votre E-mail : </label>
    <input type="text" value="jon.snow@mail.com" id="userEmail">
    <p>
        <small>Votre email ne sera utilisé que pour sauvegarder votre score, vous pouver ne pas en mettre.</small>
    </p>
    <input type="submit">
</form>
