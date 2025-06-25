<div class="wrapper">
    <h2>Logge dich bitte hier ein</h2>

    <form method="POST">

        <div class="col_2">
            <label for="email" name="lbl_li_email">Email</label>
            <input type="email" name="li_email" id="email">
        </div>

        <div class="col_2">
            <label for="pwd" name="lbl_li_pwd">Passwort</label>
            <input type="password" name="li_pwd" id="pwd">
        </div>

        <!-- <div class="col_2">
            <label for="pwd-repeat" name="lbl_pwd-repeat">Passwort</label>
            <input type="password" name="frm_li_pwd-repeat" id="pwd-repeat">
        </div> -->

        <input type="submit" name="li_submit" value="Anmelden">
    </form>

</div>

<?php

    $email = $_POST['li_email'];
    $password = $_POST['li_pwd'];

    // SQL-Abfrage für Login-Mechanismus
    $sql = "SELECT id, name, password FROM user WHERE email=?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('s', $email);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $loggedUser = $result->fetch_assoc();
        // print_r($loggedUser);
    }




?>