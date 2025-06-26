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

// wenn Ergebnis "===1", dann mache folgendes: 
if ($result->num_rows === 1) {
    // echo 'Testen des Login-Ergebnises: <br>';

    // Hole die nächste zeile aus dem Abfrage-Ergebnis $result
    $userfDB = $result->fetch_assoc();
    // echo '<b>Hallo, ' . htmlspecialchars($userfDB['name']) . '</b><br>';
    //print_r($userfDB);


    if (password_verify($password, $userfDB['password'])) {
        $_SESSION['email'] = $userfDB['email']; // wenn LOGIN erfolgreich, user merken 
        echo 'Willkommen zurück, ' . htmlspecialchars($userfDB['name']);
    } else {
        echo 'Falsches Passwort eingegeben.<br>';
        echo 'ola!<br>';
        require 'hello.php';

        // echo __DIR__;
        //require '../test.html'; --------- FRAGE: die Datei wird nicht angezeigt weil es nicht im selben VErzeichnis ist

        var_dump(password_verify($password, $userfDB['password']));
        var_dump($userfDB['password']);
        var_dump($password);

        echo '<br>';

        //require 'schnelltest.php';
        echo 'Test';

    }
} else {
    echo 'User nicht gefunden!';
}

?>