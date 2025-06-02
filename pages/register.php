<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['reg_submit'])) {
//     if(!empty($_POST['frm_reg_name'] && !empty($_POST['frm_reg_email']) && !empty($_POST['frm_reg_pwd']))){
//         setcookie("register", "registered");
//         require 'pages/mk_value.php';
//     }
// }else {
//     echo 'noch nichts ausgefpüllt!';
//     //formularwerte holen
// }

// if(!empty($_POST['reg_submit'])){
//     setcookie("register", "registered");
// }
?>

<div class="wrapper">
    <h2>Registriere dich hier und nutze die ErinnerungsApp für deinen Altag!</h2>

    <form method="POST">
        <div class="col_2">
            <label for="name" name="lbl_name">Name</label>
            <input type="text" id="name" name="frm_reg_name" required>
        </div>

        <div class="col_2">
            <label for="email" name="lbl_reg_email">Email</label>
            <input type="email" name="frm_reg_email" id="email" required>
        </div>

        <div class="col_2">
            <label for="pwd" name="lbl_reg_pwd">Passwort</label>
            <input type="password" name="frm_reg_pwd" id="pwd" required>
        </div>

        <input type="submit" name="reg_submit" value="Registrieren">
    </form>
</div>

