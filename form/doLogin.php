<?php

require_once '../config/lib.php';

global $loginEmail;

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['login_submit'])) {
    loginUser($loginEmail);

    if (isset($_SESSION['loginDone'])) {
        //echo '<p class=greeting>Willkommen zurück, ' . $_SESSION['name'] . '!</p>';
        //require '../index.html';
        header('Location: ../pages/makeValue.html', true);
    } else {
        echo 'Login fehlgeschlagen.';

        // ------------ funktion fehlt noch hier ------------------!!!
        echo '<button onclick="window.location.href = \'../pages/login.html\';" name="backButton" id="backButton" class="button">zurück zur Startseite</button>';
    }
    // } else {
    //     echo 'Ein Fehler beim Login ist aufgetreten.';
}
?>