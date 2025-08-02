<?php
require_once '../config/lib.php';

global $loginEmail;

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['login_submit'])) {
    loginUser($loginEmail);

    if (isset($_SESSION['loginDone'])) {

        header('Location: ../pages/makeValue.php');
    } else {
        echo 'Login fehlgeschlagen.';

        echo '<button onclick="window.location.href = \'../pages/login.html\';" name="backButton" id="backButton" class="button">zurück zur Startseite</button>';
    }
}
?>