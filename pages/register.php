<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //formularwerte holen
}
?>


<div class="wrapper">
    <h2>Registriere dich hier und nutze die ErinnerungsApp für deinen Altag!</h2>

    <form method="POST">
        <div class="col_2">
            <label for="name" name="lbl_name">Name</label>
            <input type="text" id="name" name="frm_reg_name">
        </div>

        <div class="col_2">
            <label for="email" name="lbl_reg_email">Email</label>
            <input type="email" name="frm_reg_email" id="email">
        </div>

        <div class="col_2">
            <label for="pwd" name="lbl_reg_pwd">Passwort</label>
            <input type="password" name="frm_reg_pwd" id="pwd">
        </div>

        <input type="submit" name="reg_submit" value="Registrieren">
    </form>
</div>