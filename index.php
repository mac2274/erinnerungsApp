<?php

require_once 'register.php'; 
require_once 'login.php';

?>

<html>
    <body>
        <form action="register.php" method="POST">
            <label for="name" name="lbl_name">Name</label>
            <input type="text" id="name" name="frm_name">

            <label for="pwd" name="lbl_pwd">Passwort</label>
            <input type="password" name="frm_pwd" id="pwd">

            <input type="submit" value="Registrieren">
        </form>
    </body>
</html>