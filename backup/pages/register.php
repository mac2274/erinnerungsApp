<?php
// Inhalt steht in lib_user.php
session_start();

require '../config/lib_user.php';
?>

<head>
    <link rel="stylesheet" href="../styles/style.css" type="text/css">
    <link rel="stylesheet" href="../styles/design.css" type="text/css">
    <link rel="stylesheet" href="../styles/activities.css" type="text/css">
</head>
<div class="wrapper">
    <h2>Registriere dich hier und nutze die ErinnerungsApp für deinen Alltag!</h2>

    <form method="POST" action="../index.php"><!-- was bringt das script hier? -->
        <div class="col_2">
            <label for="name">Name</label>
            <input type="text" id="name" name="reg_name" required>
        </div>

        <div class="col_2">
            <label for="email">Email</label>
            <input type="email" name="reg_email" id="email" required>
        </div>

        <div class="col_2">
            <label for="pwd">Passwort</label>
            <input type="password" name="reg_pwd" id="pwd" required>
        </div>

        <input type="submit" name="reg_submit" value="Registrieren">
    </form>

    <p>Oder logge dich <a id="loginLink" href="">hier</a> ein.</p>
</div>
<div id="showLogin">
    <?php require 'login.php' ?>
</div>

<!-- <script>
    let liLink = document.querySelector('#loginLink');
    liLink.addEventListener('click', openLogin);

    function openLogin(){
        document.querySelector('p').style.display = 'none';
        document.querySelector('#showLogin').style.display = 'block';
    }
</script> -->

<?php
require 'parts/loginButton.php';
//require 'login.php';
?>