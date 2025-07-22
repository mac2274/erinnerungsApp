<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ErinnerungsApp Reloaded</title>

    <link rel="stylesheet" href="../styles/style.css" type="text/css">

</head>

<body>
    <?php

    require_once '../config/lib.php';

    global $loginEmail;

    if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['login_submit'])) {
        loginUser($loginEmail);

        if (isset($_SESSION['loginDone'])) {
            //echo '<p class=greeting>Willkommen zurück, ' . $_SESSION['name'] . '!</p>';
            //require '../index.html';
            header('Location: ../pages/make.html', true );
        } else {
            echo 'Login fehlgeschlagen.';

            // ------------ funktion fehlt noch hier ------------------!!!
            echo '<button onclick="window.location.href = \'../pages/login.html\';" name="backButton" id="backButton" class="button">zurück zur Startseite</button>';
        }
    // } else {
    //     echo 'Ein Fehler beim Login ist aufgetreten.';
    }
    ?>

</body>
</html>