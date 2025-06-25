<?php

if (isset($_POST['reg_submit'])) {
    if (empty($_POST['regemail'] && empty($_POST['reg_pwd']))) {
        echo 'Beide Felder müssen ausgefüllt werden.';
    } else {
        $username = $_POST['reg_name'];
        $email = $_POST['reg_email'];
        $passwordR = $_POST['reg_pwd'];

        $stmt = $mysqli->prepare("SELECT * FROM user WHERE email:$email");
        $stmmt->bind_param('s', $email);
        $stmt->execute(); 

        if(!$stmt) {
            echo 'Prepared Statementist fehlgeschlagen: '.$stmt->errno;
        }
        return $stmt->affected_rows;
    }
}
?>

<div class="wrapper">
    <h2>Registriere dich hier und nutze die ErinnerungsApp für deinen Alltag!</h2>

    <form method="POST" action="index.php"><!-- was bringt das script hier? -->
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
</div>