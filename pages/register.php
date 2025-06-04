<?php

// bereits vorhandenen User-Logik


?>

<div class="wrapper">
    <h2>Registriere dich hier und nutze die ErinnerungsApp für deinen Altag!</h2>

    <form method="POST"><!-- was bringt das script hier? -->
        <div class="col_2">
            <label for="name" name="lbl_name">Name</label>
            <input type="text" id="name" name="reg_name" required>
        </div>

        <div class="col_2">
            <label for="email" name="lbl_reg_email">Email</label>
            <input type="email" name="reg_email" id="email" required>
        </div>

        <div class="col_2">
            <label for="pwd" name="lbl_reg_pwd">Passwort</label>
            <input type="password" name="reg_pwd" id="pwd" required>
        </div>

        <input type="submit" name="reg_submit" value="Registrieren">
    </form>
</div>

