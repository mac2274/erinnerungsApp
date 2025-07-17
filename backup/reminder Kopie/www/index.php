<?php
session_start();
require_once 'config.db.php';
require_once 'libary.php';
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Errinnerungen</title>
</head>

<body>
    <style>
        .hidden {
            display: none;
        }
    </style>

    <h1>Wilkommen bei "Meine Errinnerungen"</h1>

    <header>
        <form method="POST">
            <input type="submit" value="Registrieren" name="frm_registration_sbm" >
            <input type="submit" value="Login" name="frm_login_sbm">
            <a href="/user/logout.php">
                <input type="button" value="Logout" name="frm_logout_sbm">
            </a>
        </form>
    </header>

    <?php
    insertFormLogin();

    insertFormRegistration();
    ?>

    <main>
        <h2>Meine Errinnerungen</h2>

        <?php
        if (isset($_SESSION['eingeloggt'])) {
            require "./reminder/show.php";
        }
        ?>

    </main>

    <script>
        function show(id) {
            let frmId = "#edit_" + id;
            document.querySelector(frmId).classList.toggle("hidden");
        }
    </script>
</body>

</html>
<html>