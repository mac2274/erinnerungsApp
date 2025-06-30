<?php
//echo 'help';

$email = $_POST['li_email'];
// muss password hier überhauot gehasht werden?
$password = password_hash($_POST['li_pwd'], PASSWORD_DEFAULT);


// SQL-Abfrage für Login-Mechanismus
$sql = "SELECT id, name, password FROM user WHERE email=? && password=?";
$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    throw new Exception($mysqli->error);
}
$stmt->bind_param('ss', $email, $password);
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

        echo '1.<br>';
        var_dump(value: password_verify($password, $userfDB['password']));
        echo '2.<br>';
        var_dump($userfDB['password']);
        echo '3.<br>';
        var_dump($password);
        // echo '4.<br>';
        // echo '>' . $password . '<'; // Zeigt dir evtl. Leerzeichen
        // echo '5.<br>';
        // var_dump(strlen($password)); // sollte gleich sein mit: strlen($userfDB['password']) nur wenn im Klartext!
    }
} else {
    echo 'User nicht gefunden!';
}

?>